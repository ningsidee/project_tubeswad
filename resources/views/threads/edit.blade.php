@extends('layouts.app')

@section('title', 'Edit Thread')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Thread in {{ $thread->community->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('communities.threads.update', [$thread->community, $thread]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Thread Title</label>
                    <input type="text" name="title" id="title" class="form-control rounded p-2"
                        value="{{ $thread->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control rounded p-2" rows="4" required>{{ $thread->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update Thread</button>
                <a href="{{ route('communities.show', $thread->community) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
