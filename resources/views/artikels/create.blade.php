@extends('layouts.app')

@section('content')
    <h1>Buat Artikel Baru</h1>
    <form action="{{ route('artikels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" required>
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten Artikel</label>
            <textarea class="form-control" name="konten" id="konten" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
