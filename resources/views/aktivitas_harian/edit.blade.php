@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Aktivitas Harian</h1>

    <!-- Form untuk mengedit Aktivitas Harian -->
    <form action="{{ route('aktivitas_harian.update', $aktivitasHarian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Date Picker untuk memilih tanggal -->
        <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal', $aktivitasHarian->tanggal) }}">
                </div>
        <!-- Bagian Aktivitas Harian -->
        <div class="mb-3">
            <label for="jumlah_langkah" class="form-label">Jumlah Langkah</label>
            <input type="number" name="jumlah_langkah" id="jumlah_langkah" class="form-control" value="{{ old('jumlah_langkah', $aktivitasHarian->jumlah_langkah) }}" >
            @error('jumlah_langkah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu_tidur" class="form-label">Waktu Tidur</label>
            <input type="time" name="waktu_tidur" id="waktu_tidur" class="form-control" value="{{ old('waktu_tidur',\Carbon\Carbon::parse($aktivitasHarian->waktu_tidur)->format('H:i')) }}">
            @error('waktu_tidur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu_bangun" class="form-label">Waktu Bangun</label>
            <input type="time" name="waktu_bangun" id="waktu_bangun" class="form-control" value="{{ old('waktu_bangun', \Carbon\Carbon::parse($aktivitasHarian->waktu_bangun)->format('H:i')) }}" >
            @error('waktu_bangun')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #4B0082; border-color: #4B0082; color: #fff;">Update Data</button>
    </form>
</div>
@endsection