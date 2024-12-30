@extends('layouts.app')

@section('content')
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
@endsection
