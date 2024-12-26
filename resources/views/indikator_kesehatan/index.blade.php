@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Indikator Kesehatan</h1>

    {{-- Button untuk menambah data indikator kesehatan --}}
    <a href="{{ route('indikator-kesehatan.create') }}" class="no-print btn btn-primary mb-3">Tambah Indikator Baru</a>
    <a href="{{ route('indikator-kesehatan.create') }}" class="no-print btn btn-primary mb-3" onclick="window.print()">Print</a>
    {{-- Menampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Jika tidak ada data indikator kesehatan --}}
    @if($indikatorKesehatan->isEmpty())
        <p>Tidak ada data indikator kesehatan.</p>
    @else
        {{-- Tabel daftar indikator kesehatan --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Waktu Tidur</th>
                    <th>Waktu Bangun</th>
                    <th>BMI</th>
                    <th class="no-print">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Iterasi untuk menampilkan semua indikator kesehatan --}}
                @foreach($indikatorKesehatan as $indikator)
                <tr>
                    <td>{{ $indikator->height ?? '-' }} cm</td>
                    <td>{{ $indikator->weight ?? '-' }} kg</td>
                    <td>{{ $indikator->sleep_time ?? '-' }}</td>
                    <td>{{ $indikator->wake_time ?? '-' }}</td>
                    <td>{{ $indikator->bmi ? number_format($indikator->bmi, 2) : '-' }}</td>
                    <td class="no-print">
                        {{-- Tombol lihat untuk melihat detail --}}
                        <a href="{{ route('indikator-kesehatan.show', $indikator->id) }}" class="btn btn-info btn-sm">Lihat</a>

                        {{-- Tombol edit untuk mengubah data --}}
                        <a href="{{ route('indikator-kesehatan.edit', $indikator->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- Form untuk menghapus data --}}
                        <form action="{{ route('indikator-kesehatan.destroy', $indikator->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
@endsection
