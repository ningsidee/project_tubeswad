@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Indikator Kesehatan</h1>

    {{-- Tabel untuk menampilkan detail indikator kesehatan --}}
    <table class="table table-bordered">
        <tr>
            <th>Tinggi Badan</th>
            <td>{{ $indikator->height ?? '-' }} cm</td>
        </tr>
        <tr>
            <th>Berat Badan</th>
            <td>{{ $indikator->weight ?? '-' }} kg</td>
        </tr>
        <tr>
            <th>Waktu Tidur</th>
            <td>{{ $indikator->sleep_time ?? '-' }}</td>
        </tr>
        <tr>
            <th>Waktu Bangun</th>
            <td>{{ $indikator->wake_time ?? '-' }}</td>
        </tr>
    </table>

    {{-- Tombol untuk kembali ke daftar indikator kesehatan --}}
    <a href="{{ route('indikator-kesehatan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
