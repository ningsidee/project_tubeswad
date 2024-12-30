@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pola Makan</h1>

 <!-- Form untuk menambah pola makan -->
 <div class="card">
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-header">
            <h3>Tambah Pola Makan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pola_makan.store') }}" method="POST">
                @csrf

                <!-- Date Picker untuk memilih tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_makanan">Nama Makanan</label>
                    <input type="text" name="nama_makanan" class="form-control" id="nama_makanan" required placeholder="Masukkan nama makanan">
                    @error('nama_makanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" name="total" class="form-control" id="total" required placeholder="Masukkan total makanan">
                    @error('total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>

                <div class="form-group">
                    <label for="calories">Kalori</label>
                    <input type="number" name="calories" class="form-control" id="calories" required placeholder="Masukkan jumlah kalori">
                    @error('calories')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Pola Makan</button>
            </form>
        </div>
    </div>
</div>
@endsection

