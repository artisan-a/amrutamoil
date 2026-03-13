@extends('frontend.layouts.app')

@section('title', 'Contact Us | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-[#fafaf9] py-16 lg:py-12 relative overflow-hidden">
    <!-- Decorative Blob -->
    <div
        class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-amber-100 rounded-full mix-blend-multiply opacity-50 blur-3xl z-0 pointer-events-none">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-16 fade-in">
            <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#1c1917] mb-6">Get In Touch</h1>
            <p class="text-lg text-[#57534e] max-w-2xl mx-auto">Have questions about bulk orders, shipping, or our
                process? We’d love to hear from you.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-stone-200 fade-in delay-200">
                <h3 class="text-2xl font-bold font-serif mb-6 text-[#1c1917]">Send us a Message</h3>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-[#57534e] mb-2">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full rounded-xl border-stone-200 bg-[#fafaf9] text-[#1c1917] shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 py-3"
                            required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-[#57534e] mb-2">Phone Number</label>
                        <input type="text" name="phone" id="phone"
                            class="w-full rounded-xl border-stone-200 bg-[#fafaf9] text-[#1c1917] shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 py-3"
                            required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-[#57534e] mb-2">Your
                            Message</label>
                        <textarea name="message" id="message" rows="5"
                            class="w-full rounded-xl border-stone-200 bg-[#fafaf9] text-[#1c1917] shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 py-3"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-amber-600 hover:bg-amber-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg transition duration-300 text-lg">
                        Submit Message
                    </button>
                </form>
            </div>

            <!-- Contact Info & Map -->
            <div class="flex flex-col justify-between fade-in delay-400">
                <div class="bg-amber-600 text-white rounded-3xl p-8 shadow-xl mb-8 relative overflow-hidden">
                    <div class="absolute -bottom-10 -right-10 opacity-10">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold font-serif mb-8 relative z-10">Contact Information</h3>

                    <ul class="space-y-6 relative z-10">
                        <li class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                📍
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Our Location</h4>
                                <p class="text-amber-100">G-16, Shyam Elegance,<br>Nana Chiloda, Ahmedabad,

                                    <br>Gujarat - 382330, India
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                📞
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Phone</h4>
                                <p class="text-amber-100">+91 99797 90609<br>Mon-Sat: 9am - 6pm</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Google map placeholder -->
                <div class="bg-gray-200 rounded-3xl h-64 overflow-hidden border border-amber-900/50">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3340.020143291718!2d72.6599157!3d23.1072813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e81b0b4181a0b%3A0x72bb95b43aff6e8b!2sShyam%20Elegance!5e1!3m2!1sen!2sin!4v1772962308698!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.set(".fade-in", { y: 30, opacity: 0 });
        gsap.to(".fade-in", {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
    });
</script>
@endpush