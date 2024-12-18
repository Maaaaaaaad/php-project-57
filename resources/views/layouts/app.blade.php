<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Task Manager</title>

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Fonts -->
</head>

    <body>
        <div id="app">
            <header class="fixed w-full">
                @include('layouts.navigation')
            </header>
            <section class="bg-white dark:bg-gray-900">
                <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
                        {{ $slot }}
                </div>
            </section>
        </div>
    </body>
