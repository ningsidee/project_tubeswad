<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mangosteen</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="no-print z-1 bg-light vh-100 absolute p-3 text-white" style="width: 300px; position: sticky; top: 0;">
            @include('layouts.sidebar')
        </div>
        <!-- Navbar -->
             <header class="absolute vw-100">
                 @include('layouts.navbar')
             </header>
            <!-- Main Content -->
            <div class="mt-20 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
