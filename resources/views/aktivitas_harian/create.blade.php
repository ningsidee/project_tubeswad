@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Aktivitas Harian dan Pola Makan</h1>

    <!-- Form untuk menambah aktivitas harian -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Tambah Aktivitas Harian</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('aktivitas_harian.store') }}" method="POST">
                @csrf

                <!-- Date Picker untuk memilih tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_langkah">Jumlah Langkah</label>
                    <input type="number" name="jumlah_langkah" class="form-control" id="jumlah_langkah" required placeholder="Masukkan jumlah langkah">
                </div>

                <div class="form-group">
                    <label for="waktu_tidur">Waktu Tidur</label>
                    <input type="time" name="waktu_tidur" class="form-control" id="waktu_tidur" required>
                </div>

                <div class="form-group">
                    <label for="waktu_bangun">Waktu Bangun</label>
                    <input type="time" name="waktu_bangun" class="form-control" id="waktu_bangun" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Aktivitas Harian</button>
            </form>
        </div>
    </div>
</div>
@endsection
