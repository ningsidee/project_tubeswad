@extends('layouts.app')

@section('title', 'Create Thread')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Create Thread in {{ $community->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('communities.threads.store', $community) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Thread Title</label>
                    <input type="text" name="title" id="title" class="form-control rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control rounded p-2" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create Thread</button>
                <a href="{{ route('communities.show', $community) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
