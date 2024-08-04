<header class="text-white bg-black shadow">
    <x-container>
        <nav class="flex items-center justify-between py-4">
            <a wire:navigate href="/" class="flex items-center flex-shrink-0 mr-auto"
                aria-label="{{ config('app.name') }}">
                <x-logo />
            </a>

            {{-- Burger Icon for mobile --}}
            <div class="lg:hidden">
                <button id="burger-menu" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            {{-- Login and Register links for large screens --}}
            <div class="hidden lg:flex items-center space-x-4">
                @auth
                    <a href="{{ route('home') }}" wire:navigate
                        class="text-white-900 no-underline hover:underline font-bold">Hi, {{ Auth::user()->name ?? '' }}</a>
                    <a href="{{ route('pre-registration') }}" wire:navigate
                        class="text-white-900 no-underline hover:underline font-bold">Pre-Registration</a>
                    <a href="{{ route('logout') }}" wire:navigate
                        class="text-white-900 no-underline hover:underline font-bold">Logout</a>
                @endauth

                @guest
                    <a href="{{ route('login') }}" wire:navigate
                        class="text-white-900 no-underline hover:underline font-bold">Login</a>
                    <a href="{{ route('register') }}" wire:navigate
                        class="text-white-900 no-underline hover:underline font-bold">Register</a>
                @endguest
            </div>
        </nav>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden flex-col space-y-4 mt-4">
            @auth
                <a href="{{ route('home') }}" wire:navigate
                    class="block text-white-900 no-underline hover:underline font-bold py-2">Hi,
                    {{ Auth::user()->name ?? '' }}</a>
                <a href="{{ route('pre-registration') }}" wire:navigate
                    class="block text-white-900 no-underline hover:underline font-bold py-2">Pre-Registration</a>
                <a href="{{ route('logout') }}" wire:navigate
                    class="block text-white-900 no-underline hover:underline font-bold py-2">Logout</a>
            @endauth

            @guest
                <a href="{{ route('login') }}" wire:navigate
                    class="block text-white-900 no-underline hover:underline font-bold py-2">Login</a>
                <a href="{{ route('register') }}" wire:navigate
                    class="block text-white-900 no-underline hover:underline font-bold py-2">Register</a>
            @endguest
        </div>
    </x-container>
</header>

<script>
    document.getElementById('burger-menu').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
