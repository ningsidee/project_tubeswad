@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Rencana</h1>
    <form action="{{ route('schedulings.update', $scheduling) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" value="{{ $scheduling->hari }}" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Waktu</label>
            <input type="text" name="time" id="time" class="form-control" value="{{ $scheduling->time }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <div class="input-group date" id="datepicker" data-provide="datepicker">
                <input type="text" class="form-control" name="tanggal" id="tanggal" required value="{{ $scheduling->tanggal }}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="aktivitas" class="form-label">Aktivitas</label>
            <input type="text" name="aktivitas" id="aktivitas" class="form-control" value="{{ $scheduling->aktivitas }}" required>
        </div>
        <div class="mb-3">
            <label for="repeat" class="form-label">Ulangi</label>
            <select name="repeat" id="repeat" class="form-control" required>
                <option value="1" {{ $scheduling->repeat ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$scheduling->repeat ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
