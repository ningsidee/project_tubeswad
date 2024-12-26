@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pola Makan</h1>

    <!-- Form untuk mengedit Aktivitas Harian dan Pola Makan -->
    <form action="{{ route('pola_makan.update', $polaMakan->id) }}" method="POST">
        @csrf
        @method('PUT')
 <!-- Bagian Pola Makan -->
 <h3>Pola Makan</h3>

        <!-- Date Picker untuk memilih tanggal -->
        <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal', $polaMakan->tanggal) }}">
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" value="{{ old('nama_makanan', $polaMakan->nama_makanan) }}" required>
            @error('nama_makanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $polaMakan->total) }}" required>
            @error('total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="calories" class="form-label">Kalori</label>
            <input type="number" name="calories" id="calories" class="form-control" value="{{ old('calories', $polaMakan->calories) }}" required>
            @error('calories')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection