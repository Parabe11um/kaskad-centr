@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ 'Сайт автономной некоммерческой организации
Центр поддержки социальных и патриотических проектов ветеранов военной службы "Каскад"' }}</title>
        <meta name="description" content="{{ 'Сайт автономной некоммерческой организации
Центр поддержки социальных и патриотических проектов ветеранов военной службы "Каскад"' }} ">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/storage/app/public/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/storage/app/public/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/storage/app/public/favicon-16x16.png">
        <link rel="manifest" href="/storage/app/public/site.webmanifest">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        @include('layouts.partials.header')

        @yield('hero')

        <main class="container main-container mx-auto px-5 flex flex-grow">
            {{ $slot }}
        </main>

        @include('layouts.partials.footer')
        @stack('modals')
        @stack('scripts')
    </body>
</html>
