<nav
    x-data="{
        open: false,
        scrollY: window.scrollY,
        hidden: false,
        init() {
            window.addEventListener('scroll', () => {
                this.hidden = window.scrollY > this.scrollY;
                this.scrollY = window.scrollY;
            });
        }
    }"
    x-bind:class="hidden ? '-translate-y-full' : 'translate-y-0'"
    class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-50 shadow transition-transform duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative h-32 flex items-center justify-between">
        <!-- Левая часть -->
        <div class="flex items-center space-x-8">
            <div class="hidden sm:flex space-x-8">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Главная') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Новости') }}
                </x-nav-link>
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('О центре') }}
                </x-nav-link>
                <x-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')">
                    {{ __('Контакты') }}
                </x-nav-link>
            </div>
        </div>

        <!-- Центр: логотип -->
        <div class="absolute left-1/2 transform -translate-x-1/2">
            <a href="{{ route('home') }}" class="flex items-center">
                <x-application-mark />
            </a>
        </div>

        <!-- Правая часть -->
        <div class="hidden sm:flex items-center">
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>

        <!-- Мобильный гамбургер -->
        <div class="sm:hidden flex items-center">
            <button @click="open = !open" type="button"
                    class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Открыть меню</span>
                <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Мобильное меню -->
    <div x-show="open" x-cloak class="sm:hidden">
        <div class="pt-2 pl-4 pb-3 space-y-1">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="block px-4 py-2">
                {{ __('Главная') }}
            </x-nav-link>
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')" class="block px-4 py-2">
                {{ __('Новости') }}
            </x-nav-link>
            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')" class="block px-4 py-2">
                {{ __('О центре') }}
            </x-nav-link>
            <x-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')" class="block px-4 py-2">
                {{ __('Контакты') }}
            </x-nav-link>
        </div>
        <div class="pt-4 pl-6 pb-3 border-t border-gray-200">
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </div>
</nav>
