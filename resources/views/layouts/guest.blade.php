<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col items-center bg-violet-600 pt-6 sm:justify-center sm:pt-0">
        <div class="flex w-full max-w-md items-center rounded-lg bg-white">
            <img src="{{ asset('images/logomangosteen.png') }}" alt="Logo Mangosteen"
                class="img-fluid mx-auto h-24 p-4">
        </div>

        <div class="mt-6 w-full max-w-md overflow-hidden bg-white px-6 py-4 shadow-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
