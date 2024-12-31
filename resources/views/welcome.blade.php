<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mangosteen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen items-center justify-center bg-violet-600 text-white">
    <div class="p-6 text-center">
        <!-- Logo -->
        <div class="mb-6">
            <img src="{{ asset('images/logomangosteen.png') }}" alt="Logo Mangosteen"
                class="mx-auto h-24 rounded bg-white p-4 shadow-lg">
        </div>
        <!-- App Name -->
        <h1 class="mb-4 text-4xl font-bold tracking-wide">Welcome to Mangosteen</h1>
        <p class="mb-6 text-lg">The best platform to manage your tasks efficiently and effectively.</p>
        <!-- Buttons -->
        <div class="space-x-4">
            <a href="{{ route('login') }}"
                class="rounded-full bg-white px-6 py-3 font-medium text-violet-600 shadow-md transition hover:bg-violet-100">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="rounded-full border-2 border-white bg-transparent px-6 py-3 font-medium transition hover:bg-white hover:text-violet-600">
                Register
            </a>
        </div>
    </div>
</body>

</html>
