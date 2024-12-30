@extends('layouts.app')

@section('title', 'Create Community')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Create Community</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('communities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Field -->
                <div class="mb-3">
                    <label for="image" class="form-label">Community Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Community Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror rounded p-2" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description"
                        class="form-control @error('description') is-invalid @enderror rounded p-2">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('communities.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
