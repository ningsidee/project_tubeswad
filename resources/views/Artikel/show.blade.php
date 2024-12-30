@extends('artikel.layout')

@section('content')
    <div class="container mt-5">
        <h2>{{ $artikel->judul }}</h2>
        <p class="text-muted">{{ $artikel->author }} | {{ $artikel->created_at->format('d M Y') }}</p>
        <img src="{{ $artikel->image_url }}" alt="{{ $artikel->judul }}" class="img-fluid mb-3">
        <p>{{ $artikel->konten }}</p>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
