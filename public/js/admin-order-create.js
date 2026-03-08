document.addEventListener('DOMContentLoaded', function () {
    var productsData = window.productsData || [];
    var container = document.getElementById('itemsContainer');
    var addBtn = document.getElementById('addItemBtn');
    var discountInput = document.getElementById('discount');
    var rowIndex = 0;

    new TomSelect('#customer_id', {
        create: false,
        sortField: { field: 'text', direction: 'asc' },
        placeholder: 'Search customer...'
    });

    function createItemRow(idx) {
        var row = document.createElement('div');
        row.className = 'item-row group hover:bg-stone-50/80 transition-all duration-200';

        var opts = '<option value="">Search predefined product...</option>';
        for (var i = 0; i < productsData.length; i++) {
            var p = productsData[i];
            opts += '<option value="' + p.id + '">' + p.name + ' (' + p.size + ') - ₹' + parseFloat(p.price).toFixed(2) + '</option>';
        }

        var html = '';
        html += '<div class="grid grid-cols-1 lg:grid-cols-12 gap-4 px-6 py-4 items-center relative">';

        // Product Column
        html += '<div class="lg:col-span-6">';
        html += '<label class="lg:hidden block text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Product Description</label>';
        html += '<select class="product-select" name="items[' + idx + '][product_id]" required>' + opts + '</select>';
        html += '<div class="mt-1.5 min-h-[16px] flex gap-2 items-center"><span class="stock-badge hidden text-[9px]"></span></div>';
        html += '</div>';

        // Qty Column
        html += '<div class="lg:col-span-2">';
        html += '<label class="lg:hidden block text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1 text-center">Qty</label>';
        html += '<div class="flex items-center justify-center">';
        html += '<input type="number" name="items[' + idx + '][quantity]" min="1" value="1" class="quantity-input w-20 border-stone-200 rounded-lg text-center py-2 bg-stone-50/50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 font-bold text-stone-700 text-sm" required />';
        html += '</div>';
        html += '</div>';

        // Price Column
        html += '<div class="lg:col-span-2 text-right">';
        html += '<label class="lg:hidden block text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Price</label>';
        html += '<input type="text" readonly class="unit-price w-full border-0 bg-transparent text-right py-2 font-mono text-stone-400 text-xs" value="₹0.00" />';
        html += '</div>';

        // Total Column
        html += '<div class="lg:col-span-2 text-right pr-8 lg:pr-0">';
        html += '<label class="lg:hidden block text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Total</label>';
        html += '<input type="text" readonly class="line-total w-full border-0 bg-transparent text-right py-2 font-mono font-bold text-amber-600 text-sm" value="₹0.00" />';
        html += '</div>';

        // Delete Button (Floating/Absolute for cleaner layout)
        html += '<div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">';
        html += '<button type="button" class="remove-item-btn w-7 h-7 rounded-lg bg-red-50 text-red-400 hover:bg-red-500 hover:text-white flex items-center justify-center transition-all shadow-sm" title="Remove Item">';
        html += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>';
        html += '</button>';
        html += '</div>';

        html += '</div>';

        row.innerHTML = html;
        return row;
    }

    function findProduct(id) {
        for (var i = 0; i < productsData.length; i++) {
            if (String(productsData[i].id) === String(id)) return productsData[i];
        }
        return null;
    }

    function initProductTomSelect(row) {
        var selectEl = row.querySelector('.product-select');
        var ts = new TomSelect(selectEl, {
            create: false,
            placeholder: 'Search product...',
            valueField: 'id',
            labelField: 'text',
            searchField: ['text'],
            options: productsData.map(function (p) {
                return {
                    id: p.id,
                    text: p.name + ' (' + p.size + ') - ₹' + parseFloat(p.price).toFixed(2)
                };
            }),
            onChange: function (value) {
                var p = findProduct(value);
                var stockBadge = row.querySelector('.stock-badge');
                var unitPrice = row.querySelector('.unit-price');
                var qtyInput = row.querySelector('.quantity-input');

                if (p) {
                    unitPrice.value = '₹' + parseFloat(p.price).toFixed(2);
                    stockBadge.classList.remove('hidden');
                    stockBadge.textContent = 'Stock: ' + p.stock;

                    if (p.stock > 10) {
                        stockBadge.className = 'stock-badge px-1.5 py-0.5 rounded bg-green-50 text-green-600 border border-green-100';
                    } else if (p.stock > 0) {
                        stockBadge.className = 'stock-badge px-1.5 py-0.5 rounded bg-amber-50 text-amber-600 border border-amber-100';
                    } else {
                        stockBadge.className = 'stock-badge px-1.5 py-0.5 rounded bg-red-50 text-red-600 border border-red-100';
                        stockBadge.textContent = 'Out of Stock';
                    }

                    qtyInput.max = p.stock > 0 ? p.stock : "";
                } else {
                    unitPrice.value = '₹0.00';
                    stockBadge.classList.add('hidden');
                    qtyInput.max = "";
                }
                recalc();
            }
        });
        row._ts = ts;
    }

    function bindRowEvents(row) {
        row.querySelector('.quantity-input').addEventListener('input', recalc);
        row.querySelector('.remove-item-btn').addEventListener('click', function () {
            var rows = container.querySelectorAll('.item-row');
            if (rows.length > 1) {
                if (row._ts) row._ts.destroy();
                row.remove();
                recalc();
                updateRemoveBtns();
            }
        });
    }

    function recalc() {
        var subtotal = 0;
        var rows = container.querySelectorAll('.item-row');

        for (var r = 0; r < rows.length; r++) {
            var thisRow = rows[r];
            var price = 0;

            if (thisRow._ts) {
                var p = findProduct(thisRow._ts.getValue());
                if (p) price = parseFloat(p.price);
            }

            var qty = parseInt(thisRow.querySelector('.quantity-input').value) || 0;
            var lineTotal = price * qty;

            thisRow.querySelector('.line-total').value = '₹' + lineTotal.toFixed(2);
            subtotal += lineTotal;
        }

        var discount = parseFloat(discountInput.value) || 0;
        var finalTotal = Math.max(0, subtotal - discount);

        document.getElementById('summarySubtotal').textContent = '₹' + subtotal.toFixed(2);
        document.getElementById('summaryTotal').textContent = '₹' + finalTotal.toFixed(2);
    }

    function updateRemoveBtns() {
        var btns = container.querySelectorAll('.remove-item-btn');
        for (var i = 0; i < btns.length; i++) {
            if (btns.length === 1) {
                btns[i].disabled = true;
                btns[i].classList.add('opacity-40', 'cursor-not-allowed');
                btns[i].classList.remove('hover:bg-red-500', 'hover:text-white');
            } else {
                btns[i].disabled = false;
                btns[i].classList.remove('opacity-40', 'cursor-not-allowed');
                btns[i].classList.add('hover:bg-red-500', 'hover:text-white');
            }
        }
    }

    function addRow() {
        var row = createItemRow(rowIndex);
        container.appendChild(row);
        initProductTomSelect(row);
        bindRowEvents(row);
        updateRemoveBtns();
        rowIndex++;
    }

    addRow();

    addBtn.addEventListener('click', addRow);
    discountInput.addEventListener('input', recalc);

    document.getElementById('invoiceForm').addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
            e.preventDefault();
            return false;
        }
    });

    console.log("Admin Order Create JS fully loaded and rows added.");
});
