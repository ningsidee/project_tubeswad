@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-center align-items-center" style="height: 15vh;">
            <h1 class="fs-3 fw-semibold text-white text-center" style="background-color: #4B0082; padding: 15px; border-radius: 10px;">
                Hi! Welcome to Mangosteen
            </h1>
        </div>

        <div class="container mt-5">
            <!-- Recent Articles Section -->
            <h3 class="mb-4">Our Recent Articles</h3>
            <div class="row">
                <!-- Loop through articles -->
                @foreach ($artikels as $artikel)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ $artikel->image_url }}" class="card-img-top" alt="{{ $artikel->title }}">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $artikel->title }}</h5>
                                <p class="text-primary mb-1">{{ $artikel->author }}</p>
                                <p class="text-muted mb-2">{{ $artikel->created_at->format('d M Y') }}</p>
                                <p class="card-text">
                                    {{ Str::limit($artikel->description, 100) }}
                                </p>
                                <a href="{{ $artikel->link }}" target="_blank" class="btn btn-link text-primary">Read More
                                    →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Cards Section -->
        <div class="row mt-5">
            <!-- Scheduling -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('schedulings.index') }}">
                <div class="card h-100 shadow" style="background: linear-gradient(to bottom, #F3E5F5, #D8BFD8,); color: black;">
                    <div class="card-body text-center">
                        <span class="material-symbols-rounded" style="color: #4B0082;font-size: 36px">edit_calendar</span>
                        <h5 class="card-title fw-bold" style="color: #4B0082;">Scheduling</h5>
                        <p class="card-text">Rencanakan aktivitas kesehatan Anda dengan mudah!</p>
            
                    </div>
                </div>
                </a>
            </div>

            <!-- Indikator Kesehatan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow" style="border: none;">
                    <a href="{{ route('indikator-kesehatan.index') }}">
                    <div class="card-body text-center">
                        <span class="material-symbols-rounded" style="color: #4B0082;font-size: 36px">medical_information</span>
                        <h5 class="card-title fw-bold" style="color: #4B0082;">Health Indicator</h5>
                        <p class="card-text">Pantau dan kelola indikator kesehatan Anda dengan mudah!</p>
                    </div>
                </div>
                </a>
            </div>

            <!-- Aktivitas Harian -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow" style="border: none;">
                    <a href="{{ route('schedulings.index') }}">
                    <div class="card-body text-center">
                        <span class="material-symbols-rounded" style="color: #4B0082;font-size: 36px">footprint</span>
                        <h5 class="card-title fw-bold" style="color: #4B0082;">Daily Activity</h5>
                        <p class="card-text">Cek aktivitas harian untuk hidup lebih sehat!</p>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="row mt-4 justify-content-center">
            <!-- Article -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow" style="border: none;">
                    <a href="{{ route('schedulings.index') }}">
                    <div class="card-body text-center">
                        <span class="material-symbols-rounded" style="color: #4B0082;font-size: 36px">newsstand</span>
                        <h5 class="card-title fw-bold" style="color: #4B0082;">Article</h5>
                        <p class="card-text">Tips sehat untuk hidup lebih baik, semua di sini!</p>
                    </div>
                </div>
                </a>
            </div>

            <!-- Communication -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow" style="border: none;">
                    <a href="{{ route('schedulings.index') }}">
                    <div class="card-body text-center">
                        <span class="material-symbols-rounded" style="color: #4B0082;font-size: 36px">diversity_1</span>
                        <h5 class="card-title fw-bold" style="color: #4B0082;">Community</h5>
                        <p class="card-text">Komunitas sehat, berbagi ide, dan inspirasi bersama!</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
            
        <!-- Footer Section -->
        <div class="text-center mt-5">
            <p class="text-muted">&copy; 2024 Mangosteen. Design with ❤️ by Group 6.</p>
        </div>
    </div>
@endsection