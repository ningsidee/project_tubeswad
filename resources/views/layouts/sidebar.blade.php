<nav class="d-flex flex-column align-items-center align-items-sm-start text-white position-fixed top-0 start-0 shadow p-3 mb-5 bg-body-tertiary rounded"
    style="width: 300px; height: 100vh; 
           background: linear-gradient(to bottom, #F3E5F5, #D8BFD8, #5c275e); 
           background-size: cover;
           border-radius: 0 50px 0 0;
           padding: 20px; margin: 0;">
           

<!-- header -->
<a href="/" class="d-flex align-items-center mb-4 text-white text-decoration-none" 
   style="justify-content: center; width: 100%;">
    <img src="{{ asset('images/logomangosteen.png') }}" alt="Logo Mangosteen" class="img-fluid" 
         style="max-height: 70px; width: auto;">
</a>



    <!-- Navigation Links -->
    <ul class="nav flex-column w-100">
        <!-- Dashboard -->
        <li class="nav-item mb-3 {{ Route::is('dashboard') ? 'fw-bold' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                <span class="material-symbols-rounded" style="color: #4B0082;">dashboard</span>
                <span class="ms-3 d-none d-sm-inline">Dashboard</span>
                @if (Route::is('dashboard'))
                    <span class="ms-auto text-warning material-symbols-rounded">circle</span>
                @endif
            </a>
        </li>

        <!-- Scheduling -->
        <li class="nav-item mb-3 {{ Route::is('schedulings.index') ? 'fw-bold' : '' }}">
            <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
            <span class="material-symbols-rounded">edit_calendar</span>
                <span class="ms-3 d-none d-sm-inline">Scheduling</span>
                @if (Route::is('schedulings.index'))
                    <span class="ms-auto text-warning material-symbols-rounded">circle</span>
                @endif
            </a>
        </li>

        <!-- indikator kesehatan -->
        <li class="nav-item mb-3 {{ Route::is('schedulings.index') ? 'fw-bold' : '' }}">
            <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                <span class="material-symbols-rounded" style="color: #4B0082;">medical_information</span>
                <span class="ms-3 d-none d-sm-inline">Health Indicator</span>
                @if (Route::is('schedulings.index'))
                    
                @endif
            </a>
        </li>

        <!-- Aktivitas Harian -->
        <li class="nav-item mb-3 {{ Route::is('schedulings.index') ? 'fw-bold' : '' }}">
            <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                <span class="material-symbols-rounded" style="color: #4B0082;">footprint</span>
                <span class="ms-3 d-none d-sm-inline">Daily Activity</span>
                @if (Route::is('schedulings.index'))
                    
                @endif
            </a>
        </li>

        <!-- Artikel -->
        <li class="nav-item mb-3 {{ Route::is('schedulings.index') ? 'fw-bold' : '' }}">
            <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                <span class="material-symbols-rounded" style="color: #4B0082;">newsstand</span>
                <span class="ms-3 d-none d-sm-inline">Article</span>
                @if (Route::is('schedulings.index'))
                    
                @endif
            </a>
        </li>

        <!-- Community -->
        <li class="nav-item mb-3 {{ Route::is('schedulings.index') ? 'fw-bold' : '' }}">
            <a href="{{ route('schedulings.index') }}" class="nav-link d-flex align-items-center" style="color: #4B0082;">
                <span class="material-symbols-rounded" style="color: #4B0082;">diversity_1</span>
                <span class="ms-3 d-none d-sm-inline">Community</span>
                @if (Route::is('schedulings.index'))
                    
                @endif
            </a>
        </li>

        <!-- Divider -->
        <div class="border-top border-secondary w-100 my-3"></div>
    </ul>
</nav>
