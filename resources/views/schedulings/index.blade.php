@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Rencana Pola Hidup Sehat</h1>
    <a href="{{ route('schedulings.create') }}" class="btn btn-primary mb-3">Buat Rencana Baru</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($schedulings->isEmpty())
        <p>Tidak ada jadwal yang tersedia.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Aktivitas</th>
                    <th>Ulangi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedulings as $scheduling)
                    <tr>
                        <td>{{ $scheduling->hari }}</td>
                        <td>{{ $scheduling->time }}</td>
                        <td>{{ $scheduling->aktivitas }}</td>
                        <td>{{ $scheduling->repeat ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <a href="{{ route('schedulings.show', $scheduling) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('schedulings.edit', $scheduling) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('schedulings.destroy', $scheduling) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection