<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aktivitas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Daftar Aktivitas</h1>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table of Activities -->
    <table class="table table-bordered table-striped mt-4">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Aktivitas</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($activities as $activity)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->created_at->format('d M Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada aktivitas yang terdaftar.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Cards for Highlighted Activities -->
    <div class="mt-5">
        <h2 class="text-center">Aktivitas Unggulan</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Kelas Yoga">
                    <div class="card-body">
                        <h5 class="card-title">Kelas Yoga</h5>
                        <p class="card-text">Tingkatkan fleksibilitas dan ketenangan dengan kelas yoga harian.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Lari">
                    <div class="card-body">
                        <h5 class="card-title">Lari 5 KM</h5>
                        <p class="card-text">Ikuti tantangan lari untuk meningkatkan stamina dan kesehatan.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Workout di Rumah">
                    <div class="card-body">
                        <h5 class="card-title">Workout di Rumah</h5>
                        <p class="card-text">Latihan sederhana yang bisa dilakukan di rumah untuk menjaga kebugaran.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
