<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Amrutam Ground Nut Oil | Premium Cold Pressed')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700|playfair-display:400,600,700"
        rel="stylesheet" />

    <!-- GSAP for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="antialiased font-sans">

    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition.opacity.duration.500ms
        x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-20 right-5 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, scrolled: false }"
        @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false"
        :class="{'shadow-md glass-nav': scrolled, 'bg-transparent': !scrolled}"
        class="fixed w-full z-40 transition-all duration-300 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <!-- Brand Logo -->
                        <img src="{{ asset('images/logo.png') }}" alt="Amrutam Oil Logo" class="h-10 w-auto">
                        <img src="{{ asset('images/amrutam-wordmark.png') }}" alt="Amrutam"
                            class="h-7 w-auto max-w-[220px] object-contain"
                            onerror="this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden');">
                        <span class="hidden font-bold text-2xl tracking-tight text-amber-900 font-serif">Amrutam</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-amber-600 font-bold' : 'text-stone-700 font-medium hover:text-amber-600' }} transition">Home</a>
                    <a href="{{ route('about') }}"
                        class="{{ request()->routeIs('about') ? 'text-amber-600 font-bold' : 'text-stone-700 font-medium hover:text-amber-600' }} transition">About</a>
                    <a href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.*') ? 'text-amber-600 font-bold' : 'text-stone-700 font-medium hover:text-amber-600' }} transition">Products</a>
                    <a href="{{ route('process') }}"
                        class="{{ request()->routeIs('process') ? 'text-amber-600 font-bold' : 'text-stone-700 font-medium hover:text-amber-600' }} transition">Our
                        Process</a>
                    <a href="{{ route('blog.index') }}"
                        class="{{ request()->routeIs('blog.*') ? 'text-amber-600 font-bold' : 'text-stone-700 font-medium hover:text-amber-600' }} transition">Blog</a>
                    <a href="{{ route('contact') }}" class="btn-primary py-2 px-6 text-sm">Contact Us</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-stone-700 hover:text-amber-600 font-medium font-bold focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition.opacity
            class="md:hidden bg-white shadow-xl absolute w-full border-t border-gray-100">
            <div class="px-4 pt-2 pb-6 space-y-2 flex flex-col">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">Home</a>
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">About</a>
                <a href="{{ route('products.index') }}"
                    class="{{ request()->routeIs('products.*') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">Products</a>
                <a href="{{ route('process') }}"
                    class="{{ request()->routeIs('process') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">Our
                    Process</a>
                <a href="{{ route('blog.index') }}"
                    class="{{ request()->routeIs('blog.*') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">Blog</a>
                <a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'bg-amber-50 text-amber-600 font-bold' : 'text-stone-700 font-medium hover:bg-stone-50' }} block px-3 py-2 rounded-md transition">Contact
                    Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-stone-800 text-stone-300 py-12 border-t-4 border-amber-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Branding -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Amrutam Oil Logo"
                            class="h-10 w-auto object-contain">
                        <span class="font-bold text-2xl text-white font-serif">Amrutam Oil</span>
                    </div>
                    <p class="mb-4 max-w-sm text-[#78716c]">Pure, traditional cold-pressed groundnut oil, directly from
                        our farm to your kitchen. Experience the true taste of health.</p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-4 font-serif">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-600 transition">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-amber-600 transition">Our Oil</a>
                        </li>
                        <li><a href="{{ route('why-cold-pressed') }}" class="hover:text-amber-600 transition">Why Cold
                                Pressed</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-600 transition">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-4 font-serif">Contact</h3>
                    <ul class="space-y-2 text-[#78716c]">
                        <li>📍 G-16, Shyam Elegance,<br>Nana Chiloda, Ahmedabad, <br>Gujarat - 382330, India</li>
                        <li>📞 +91 99797 90609</li>
                        <li>✉️ pure@amrutamoil.com</li>
                    </ul>
                </div>
            </div>
            <div
                class="mt-8 pt-8 border-t border-stone-800 text-center text-sm text-[#78716c] flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} Amrutam Ground Nut Oil. All rights reserved.</p>
                @auth
                <a href="{{ route('dashboard') }}" class="text-amber-600 hover:text-amber-600 mt-2 md:mt-0">Admin
                    Dashboard</a>
                @endauth
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/919979790609?text=Hi!%20I%20have%20an%20inquiry%20regarding%20Amrutam%20Ground%20Nut%20Oil."
        target="_blank"
        class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-2xl transition duration-300 transform hover:scale-110 z-50 flex items-center justify-center group">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M12.031 0C5.385 0 0 5.384 0 12.03c0 2.126.549 4.197 1.597 6.02L.036 24l6.12-1.603a11.968 11.968 0 0 0 5.875 1.53h.005c6.645 0 12.03-5.385 12.03-12.03 0-6.645-5.385-12.03-12.03-12.03zm0 21.947c-1.801 0-3.565-.483-5.115-1.401l-.367-.217-3.8.995.996-3.704-.239-.38C2.502 15.602 1.982 13.844 1.982 12.03c0-5.549 4.516-10.065 10.065-10.065 5.548 0 10.064 4.516 10.064 10.065s-4.516 10.065-10.064 10.065zm5.526-7.558c-.302-.15-1.794-.886-2.071-.987-.278-.101-.482-.152-.684.152-.202.304-.784.987-.96 1.19-.176.202-.352.228-.654.076-.302-.15-1.282-.473-2.443-1.509-.906-.807-1.517-1.803-1.693-2.106-.176-.304-.019-.468.132-.618.135-.135.302-.354.453-.532.152-.178.203-.304.304-.506.101-.202.05-.38-.025-.532-.076-.152-.684-1.644-.937-2.253-.245-.591-.497-.512-.684-.52h-.584c-.203 0-.532.076-.811.38-.278.304-1.066 1.04-1.066 2.536s1.091 2.94 1.243 3.143c.152.203 2.144 3.275 5.195 4.593.725.313 1.291.501 1.733.642.727.23 1.388.197 1.908.12.584-.085 1.794-.734 2.046-1.442.253-.709.253-1.317.178-1.443-.076-.126-.278-.202-.58-.353z" />
        </svg>
        <span
            class="absolute right-full mr-4 bg-stone-800 text-white text-sm px-3 py-1 rounded-md opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none whitespace-nowrap">
            Chat with us
        </span>
    </a>



    <!-- Custom Mouse Interaction Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Magnetic Button Effect
            const magneticElements = document.querySelectorAll('.btn-primary, .btn-outline, a, button');
            magneticElements.forEach((el) => {
                el.addEventListener('mousemove', (e) => {
                    const rect = el.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    gsap.to(el, {
                        x: x * 0.3,
                        y: y * 0.3,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                });

                el.addEventListener('mouseleave', () => {
                    gsap.to(el, {
                        x: 0,
                        y: 0,
                        duration: 0.8,
                        ease: "elastic.out(1, 0.3)"
                    });
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
