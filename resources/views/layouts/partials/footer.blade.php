<footer class="text-sm space-x-4 flex items-center border-t border-gray-100 flex-wrap justify-center py-4 ">
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
</footer>
