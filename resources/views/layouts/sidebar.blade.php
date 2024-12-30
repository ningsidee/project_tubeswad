<nav class="d-flex flex-column align-items-center align-items-sm-start position-fixed bg-body-tertiary start-0 top-0 mb-5 rounded p-3 text-white shadow"
<nav class="d-flex flex-column align-items-center align-items-sm-start position-fixed bg-body-tertiary start-0 top-0 mb-5 rounded p-3 text-white shadow"
    style="width: 300px; height: 100vh; 
           background: linear-gradient(to bottom, #F3E5F5, #D8BFD8, #5c275e); 
           background-size: cover;
           border-radius: 0 50px 0 0;
           padding: 20px; margin: 0;">

    <!-- Header -->
    <a href="/" class="d-flex align-items-center text-decoration-none mb-4 text-white"
        style="justify-content: center; width: 100%;">
        <img src="{{ asset('images/logomangosteen.png') }}" alt="Logo Mangosteen" class="img-fluid"
            style="max-height: 70px; width: auto;">
    </a>

    <!-- Conditional Sidebar Content -->
    @if (Auth::user()->role === 'admin')
        <!-- Admin Sidebar -->
        <ul class="nav flex-column w-100">
            <!-- Dashboard -->
            <li class="nav-item {{ Route::is('dashboard') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">dashboard</span>
                    <span class="d-none d-sm-inline ms-3">Dashboard</span>
                    @if (Route::is('dashboard'))
                        <span class="text-warning material-symbols-rounded ms-auto">circle</span>
                    @endif
                </a>
            </li>

            <!-- Articles -->
            <li class="nav-item {{ Route::is('artikel.index') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('artikel.index') }}" class="nav-link d-flex align-items-center"
                    style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">newsstand</span>
                    <span class="d-none d-sm-inline ms-3">Article</span>
                    @if (Route::is('artikel.index'))
                        <span class="text-warning material-symbols-rounded ms-auto">circle</span>
                    @endif
                </a>
            </li>
        </ul>
    @else
        <!-- User Sidebar -->
        <ul class="nav flex-column w-100">
            <!-- Dashboard -->
            <li class="nav-item {{ Route::is('dashboard') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">dashboard</span>
                    <span class="d-none d-sm-inline ms-3">Dashboard</span>
                    @if (Route::is('dashboard'))
                        <span class="text-warning material-symbols-rounded ms-auto">circle</span>
                    @endif
                </a>
            </li>

            <!-- Scheduling -->
            <li class="nav-item {{ Route::is('schedulings.index') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center"
                    style="color: #4B0082;">
                    <span class="material-symbols-rounded">edit_calendar</span>
                    <span class="d-none d-sm-inline ms-3">Scheduling</span>
                    @if (Route::is('schedulings.index'))
                        <span class="text-warning material-symbols-rounded ms-auto">circle</span>
                    @endif
                </a>
            </li>

            <!-- Health Indicator -->
            <li class="nav-item {{ Route::is('schedulings.index') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center"
                    style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">medical_information</span>
                    <span class="d-none d-sm-inline ms-3">Health Indicator</span>
                </a>
            </li>

            <!-- Daily Activity -->
            <li class="nav-item {{ Route::is('schedulings.index') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center"
                    style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">footprint</span>
                    <span class="d-none d-sm-inline ms-3">Daily Activity</span>
                </a>
            </li>

            <!-- Community -->
            <li class="nav-item {{ Route::is('schedulings.index') ? 'fw-bold' : '' }} mb-3">
                <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center"
                    style="color: #4B0082;">
                    <span class="material-symbols-rounded" style="color: #4B0082;">diversity_1</span>
                    <span class="d-none d-sm-inline ms-3">Community</span>
                </a>
            </li>
        </ul>
    @endif
</nav>
