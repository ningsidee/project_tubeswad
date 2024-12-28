@extends('layouts.app')

@section('content')
    <h1>Edit Artikel</h1>
    <form action="{{ route('artikels.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ $artikel->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten Artikel</label>
            <textarea class="form-control" name="konten" id="konten" rows="5" required>{{ $artikel->konten }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
