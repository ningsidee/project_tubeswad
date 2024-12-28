@extends('artikel.layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Artikel</h2>
        <form action="{{ route('artikels.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $artikel->judul }}">
            </div>
            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea class="form-control" id="konten" name="konten" rows="5">{{ $artikel->konten }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ $artikel->image_url }}" alt="{{ $artikel->judul }}" class="mt-3" style="max-width: 150px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
