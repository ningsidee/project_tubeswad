@extends('layouts.app')

@section('content')
<style>
    label { margin-left: 20px; }
    #datepicker { width: 100%; }
    #datepicker > span:hover { cursor: pointer; }
</style>
<div class="container">
    <h1>Buat Rencana Baru</h1>
    
    <form action="{{ route('schedulings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="time" class="form-label">Waktu</label>
            <input type="text" name="time" id="time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <div class="input-group date" id="datepicker" data-provide="datepicker">
                <input type="text" class="form-control" name="tanggal" id="tanggal" required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="aktivitas" class="form-label">Aktivitas</label>
            <input type="text" name="aktivitas" id="aktivitas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="repeat" class="form-label">Ulangi</label>
            <select name="repeat" id="repeat" class="form-control" required>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
        <button type="submit" class="btn" style="background-color: #4B0082 !important; color: white !important;">Simpan</button>


    </form>
</div>

<!-- Include JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true
        });
    });
</script>
@endsection
