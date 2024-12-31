@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Article</h1>
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" name="link" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Date</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
@endsection
