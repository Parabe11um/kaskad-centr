<footer class="text-sm space-x-4 flex items-center border-t border-gray-100 flex-wrap justify-center py-4 ">
    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
        {{ __('Главная') }}
    </x-nav-link>
    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
        {{ __('Блог') }}
    </x-nav-link>
</footer>
