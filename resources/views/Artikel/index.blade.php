@extends('artikel.layout')

@section('content')
    <div class="container mt-5">
        <!-- Hero Section -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <img src="{{ asset('images/highlight.jpg') }}" class="card-img-top" alt="Highlight Artikel">
                    <div class="card-body">
                        <p class="badge bg-primary mb-2">News</p>
                        <h2 class="card-title">Unlocking Efficiency: The Power Of A Modern POS System</h2>
                        <p class="text-muted">8 mins read</p>
                        <p class="card-text">
                            In today's fast-paced business landscape, efficiency is key to success...
                        </p>
                        <a href="#" class="btn btn-link text-primary">Read More →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Articles Section -->
        <h3 class="mb-4">Our Recent Articles</h3>
        <div class="row">
            <!-- Loop through articles -->
            @foreach ($artikels as $artikel)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ $artikel->image_url ?? asset('images/default-article.jpg') }}" class="card-img-top" alt="{{ $artikel->judul }}">
                        <div class="card-body">
                            <p class="text-primary mb-1">{{ $artikel->author }}</p>
                            <p class="text-muted mb-2">{{ $artikel->created_at->format('d M Y') }}</p>
                            <h5 class="card-title">{{ $artikel->judul }}</h5>
                            <p class="card-text">
                                {{ Str::limit($artikel->konten, 100) }}
                            </p>
                            <a href="{{ route('artikels.show', $artikel->id) }}" class="btn btn-link text-primary">Read More →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
