<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ??  config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased"    x-data="{drawerShoppingCart: false}"  @keydown.escape.window="drawerShoppingCart = false" >

        @include('layouts.partials.guest.left-menu', ['layout' => 'store'])

        <div class="min-h-screen bg-primary  lg:pl-72">
            @include('layouts.partials.guest.top-menu')

            <main class="py-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
