<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Левая часть: логотип -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark />
                    </a>
                </div>
                <!-- Главное меню (скрыто на мобильных) -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
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

            <!-- Правая часть: авторизация -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    @include('layouts.partials.header-right-auth')
                @else
                    @include('layouts.partials.header-right-guest')
                @endauth
            </div>

            <!-- Мобильное меню (гамбургер) -->
            <div class="-mr-2 flex items-center sm:hidden">
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
    </div>

    <!-- Мобильное меню -->
    <div x-show="open" x-cloak class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="block my-4 border-transparent text-base font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800">
                {{ __('Главная') }}
            </x-nav-link>
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')" class="block my-4 border-transparent text-base font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800">
                {{ __('Новости') }}
            </x-nav-link>
            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')" class="block my-4 border-transparent text-base font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800">
                {{ __('О центре') }}
            </x-nav-link>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </div>
</nav>
