@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jadwal</h1>
    <p><strong>Hari:</strong> {{ $scheduling->hari }}</p>
    <p><strong>Waktu:</strong> {{ $scheduling->time }}</p>
    <p><strong>Aktivitas:</strong> {{ $scheduling->aktivitas }}</p>
    <p><strong>Ulangi:</strong> {{ $scheduling->repeat ? 'Ya' : 'Tidak' }}</p>
    <a href="{{ route('schedulings.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
