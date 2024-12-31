@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('artikel.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $article->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" name="link" value="{{ $article->link }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Date</label>
                <input type="date" name="tanggal" value="{{ $article->tanggal }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
