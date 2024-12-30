@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Aktivitas Harian dan Pola Makan</h1>

    <!-- Tombol Create untuk Aktivitas Harian -->
    <a href="{{ route('aktivitas_harian.create') }}" class="btn btn-primary mb-3">Tambah Aktivitas Harian</a>

    <!-- Daftar Aktivitas Harian -->
    <h3>Aktivitas Harian</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Langkah</th>
                <th>Waktu Tidur</th>
                <th>Waktu Bangun</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aktivitasHarian as $aktivitas)
                <tr>
                    <td>{{ $aktivitas->tanggal }}</td>
                    <td>{{ $aktivitas->jumlah_langkah }}</td>
                    <td>{{ $aktivitas->waktu_tidur }}</td>
                    <td>{{ $aktivitas->waktu_bangun }}</td>
                    <td>
                        <!-- Edit Aktivitas Harian -->
                        <a href="{{ route('aktivitas_harian.edit', $aktivitas->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Aktivitas Harian -->
                        <form action="{{ route('aktivitas_harian.destroy', $aktivitas->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas harian ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol Create untuk Pola Makan -->
    <a href="{{ route('pola_makan.create') }}" class="btn btn-primary mb-3">Tambah Pola Makan</a>

    <!-- Daftar Pola Makan -->
    <h3>Pola Makan</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Makanan</th>
                <th>Total</th>
                <th>Kalori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($polaMakan as $pola)
                <tr>
                    <td>{{ $pola->tanggal }}</td>
                    <td>{{ $pola->nama_makanan }}</td>
                    <td>{{ $pola->total }}</td>
                    <td>{{ $pola->calories }}</td>
                    <td>
                        <!-- Edit Pola Makan -->
                        <a href="{{ route('pola_makan.edit', $pola->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Pola Makan -->
                        <form action="{{ route('pola_makan.destroy', $pola->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pola makan ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
