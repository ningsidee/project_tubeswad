@extends('layouts.app')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
    <a href="{{ route('indikator-kesehatan.index') }}" class="btn btn-outline-primary d-flex gap-2" style="background-color: #4B0082; color: white;">
        <div class="">
        <span class="material-symbols-rounded">arrow_back</span>
        </div>
        Daftar Indikator Kesehatan
    </a>
</div>


    {{-- Form Edit Indikator Kesehatan --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('indikator-kesehatan.update', $indikator->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="height" class="form-label">Tinggi Badan (cm)</label>
                    <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                        name="height" value="{{ old('height', $indikator->height) }}" placeholder="Masukkan tinggi badan">
                    @error('height')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Berat Badan (kg)</label>
                    <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                        name="weight" value="{{ old('weight', $indikator->weight) }}" placeholder="Masukkan berat badan">
                    @error('weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sleep_time" class="form-label">Waktu Tidur</label>
                    <input type="time" class="form-control @error('sleep_time') is-invalid @enderror" id="sleep_time"
                        name="sleep_time" value="{{ old('sleep_time', $indikator->sleep_time) }}">
                    @error('sleep_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="wake_time" class="form-label">Waktu Bangun</label>
                    <input type="time" class="form-control @error('wake_time') is-invalid @enderror" id="wake_time"
                        name="wake_time" value="{{ old('wake_time', $indikator->wake_time) }}">
                    @error('wake_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="{{ route('indikator-kesehatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
