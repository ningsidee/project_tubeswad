@extends('layouts.app')

@section('content')
    <h1>Daftar Artikel</h1>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">Buat Artikel Baru</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikels as $artikels)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>
                        <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
