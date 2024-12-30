@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articles</h1>
        <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">Add Article</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="card-img-top"
                            style="width: 1000px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                            <p class="text-muted">{{ $article->tanggal }}</p>
                            <div class="d-flex justify-content-between mt-2">
                                <a href="{{ route('artikel.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('artikel.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
