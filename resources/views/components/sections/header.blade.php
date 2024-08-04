<header class="text-white bg-black shadow">
    <x-container>
        <nav class="flex items-center justify-between py-4">
            <a wire:navigate href="/" class="flex items-center flex-shrink-0 mr-auto"
                aria-label="{{ config('app.name') }}">
                <x-logo />
            </a>

            {{-- Login and Register links --}}
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
    </x-container>
</header>
