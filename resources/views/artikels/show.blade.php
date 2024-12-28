@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Artikel Header -->
        <div class="text-center mb-4">
            <h1 class="display-4">{{ $artikel->judul }}</h1>
            <p class="text-muted">Dipublikasikan pada {{ $artikel->created_at->format('d M Y') }}</p>
        </div>

        <!-- Gambar Artikel -->
        <div class="text-center mb-4">
            <img src="{{ asset('images/artikel-default.jpg') }}" alt="{{ $artikel->judul }}" class="img-fluid rounded" style="max-height: 400px;">
        </div>

        <!-- Konten Artikel -->
        <div class="artikel-content mb-5">
            <p style="font-size: 1.2rem; line-height: 1.8;">{{ $artikel->konten }}</p>
        </div>

        <!-- Bagikan Artikel -->
        <div class="share-section text-center mb-5">
            <h5>Bagikan Artikel:</h5>
            <div>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-primary me-2">Facebook</a>
                <a href="https://twitter.com/share?url={{ url()->current() }}&text={{ urlencode($artikel->judul) }}" target="_blank" class="btn btn-info me-2">Twitter</a>
                <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' ' . url()->current()) }}" target="_blank" class="btn btn-success">WhatsApp</a>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="text-center">
            <a href="{{ route('artikels.index') }}" class="btn btn-secondary">Kembali ke Daftar Artikel</a>
        </div>
    </div>
@endsection
