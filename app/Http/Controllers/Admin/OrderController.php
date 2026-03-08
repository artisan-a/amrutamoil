<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $orders = Order::with('customer')
            ->when($search, function ($query, $search) {
            return $query->where('invoice_number', 'like', "%{$search}%")
            ->orWhereHas('customer', function ($q) use ($search) {
                    $q->where('customer_name', 'like', "%{$search}%");
                }
                );
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders', 'search'));
    }

    public function create()
    {
        $customers = Customer::orderBy('customer_name')->get();
        $products = Product::where('status', true)->get();

        // Prepare product data for JS (avoids Blade parse issues with closures)
        $productsJson = $products->map(function ($p) {
            return [
            'id' => $p->id,
            'name' => $p->name,
            'size' => $p->size,
            'price' => $p->price,
            'stock' => $p->stock_quantity,
            ];
        })->values()->toArray();

        // Generate Invoice Number
        $today = date('Ymd');
        $lastOrder = Order::whereDate('created_at', date('Y-m-d'))->latest()->first();
        $sequence = $lastOrder ? (int)substr($lastOrder->invoice_number, -3) + 1 : 1;
        $invoiceNumber = 'INV-' . $today . '-' . str_pad($sequence, 3, '0', STR_PAD_LEFT);

        return view('admin.orders.create', compact('customers', 'products', 'invoiceNumber', 'productsJson'));
    }

    public function store(Request $request)
    {
        // Debugging payload to see what's actually being submitted right before validation
        if (config('app.debug')) {
            \Illuminate\Support\Facades\Log::info('Order Store Payload:', $request->all());
        }

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'discount' => 'nullable|numeric|min:0',
            'payment_status' => 'required|in:Pending,Paid,Cancelled',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $totalAmount = 0;

            // Calculate total first and check stock
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock_quantity < $item['quantity']) {
                    throw new \Exception("Insufficient stock for {$product->name}. Only {$product->stock_quantity} remaining.");
                }

                $totalAmount += ($product->price * $item['quantity']);
            }

            $discount = $request->input('discount', 0);
            $finalAmount = $totalAmount - $discount;

            // Create Order
            $order = Order::create([
                'invoice_number' => $request->invoice_number, // Passed securely from form or regenerated here
                'customer_id' => $request->customer_id,
                'total_amount' => $totalAmount,
                'discount' => $discount,
                'final_amount' => $finalAmount,
                'payment_status' => $request->payment_status,
                'order_date' => $request->order_date,
            ]);

            // Create Items & Deduct Stock
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $lineTotal = $product->price * $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $lineTotal,
                ]);

                // Adjust Stock
                $product->decrement('stock_quantity', $item['quantity']);
            }

            DB::commit();
            return redirect()->route('admin.orders.show', $order)->with('success', 'Invoice created successfully.');

        }
        catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show(Order $order)
    {
        $order->load(['customer', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function downloadPdf(Order $order)
    {
        $order->load(['customer', 'items.product']);
        $pdf = Pdf::loadView('admin.orders.pdf', compact('order'));
        return $pdf->download($order->invoice_number . '.pdf');
    }

    public function destroy(Order $order)
    {
        try {
            DB::beginTransaction();

            // Revert stock before deleting
            foreach ($order->items as $item) {
                $item->product->increment('stock_quantity', $item->quantity);
            }

            $order->delete();
            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Invoice deleted and stock restored.');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete invoice.');
        }
    }
}