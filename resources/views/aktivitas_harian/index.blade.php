@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4">Aktivitas Harian dan Pola Makan</h1>
        <p class="lead text-muted">Kelola Aktivitas Harian dan Pola Makan Anda dengan Mudah dan Terorganisir.</p>
    </div>

    <!-- Tombol Create -->
    <div class=" no-print d-flex justify-content-between mb-4">
        <a href="{{ route('aktivitas_harian.create') }}" class="no-print btn btn-lg text-white" 
           style="background-color: #4B0082; border-color: #4B0082;">
           <i class="fas fa-walking me-2"></i>Tambah Aktivitas Harian 
           <a class="no-print btn mb-3" onclick="window.print()" style="background-color: #4B0082 !important; color: white !important;"><span class="material-symbols-rounded" style="font-size: 18px;" >print</span>Print</a>
        </a>
    </div>

    <!-- Daftar Aktivitas Harian -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-indigo text-white"  style="background-color: #4B0082; border-color: #4B0082; color: #fff;">
            <h3 class="card-title mb-0"  style="background-color: #4B0082; border-color: #4B0082; color: #fff;">Daftar Aktivitas Harian</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Langkah</th>
                        <th>Waktu Tidur</th>
                        <th>Waktu Bangun</th>
                        <th class=" no-print text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aktivitasHarian as $aktivitas)
                        <tr>
                            <td>{{ $aktivitas->tanggal }}</td>
                            <td>{{ $aktivitas->jumlah_langkah }}</td>
                            <td>{{ $aktivitas->waktu_tidur }}</td>
                            <td>{{ $aktivitas->waktu_bangun }}</td>
                            <td class="no-print text-center">
                                <a href="{{ route('aktivitas_harian.edit', $aktivitas->id) }}" 
                                   class="btn btn-sm btn-warning me-1">
                                   <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('aktivitas_harian.destroy', $aktivitas->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada aktivitas harian yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="no-print d-flex justify-content-between mb-4">
        <a href="{{ route('pola_makan.create') }}" class="no-print btn btn-lg text-white" 
            style="background-color: #4B0082; border-color: #4B0082;">
            <i class="fas fa-utensils me-2"></i>Tambah Pola Makan
        </a>
    </div>

    <!-- Daftar Pola Makan -->
    <div class="card shadow-sm">
        <div class="card-header bg-indigo text-white"  style="background-color: #4B0082; border-color: #4B0082; color: #fff;">
            <h3 class="card-title mb-0"  style="background-color: #4B0082; border-color: #4B0082; color: #fff;">Daftar Pola Makan</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Makanan</th>
                        <th>Total</th>
                        <th>Kalori</th>
                        <th class=" no-print text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($polaMakan as $pola)
                        <tr>
                            <td>{{ $pola->tanggal }}</td>
                            <td>{{ $pola->nama_makanan }}</td>
                            <td>{{ $pola->total }}</td>
                            <td>{{ $pola->calories }}</td>
                            <td class="no-print text-center">
                                <a href="{{ route('pola_makan.edit', $pola->id) }}" 
                                   class="btn btn-sm btn-warning me-1">
                                   <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('pola_makan.destroy', $pola->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pola makan ini?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada pola makan yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
@endsection
