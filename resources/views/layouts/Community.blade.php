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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
