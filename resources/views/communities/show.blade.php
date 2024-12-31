@extends('layouts.app')

@section('title', $community->name)

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="fw-bold">{{ $community->name }}</h4>
        </div>
        <div class="card-body">
            <p class="mb-2">{{ $community->description }}</p>
            <hr>
            <h5 class="my-2">Participants</h5>
            <ul class="list-group mb-4">
                @foreach ($community->participants as $participant)
                    <li class="list-group-item">
                        {{ $participant->user->name }} ({{ ucfirst($participant->role) }})
                    </li>
                @endforeach
            </ul>

            <h5 class="mb-2">Threads</h5>
            <!-- Semua pengguna bisa membuat thread -->
            <a href="{{ route('communities.threads.create', $community) }}" class="btn btn-primary mb-3">Create Thread</a>

            <ul class="list-group shadow-sm">
                @foreach ($community->threads as $thread)
                    <li class="list-group-item">
                        <div>
                            <span class="fw-semibold">{{ $thread->user->name }}</span>
                        </div>
                        <div>
                            <h5 class="fw-semibold">Judul : {{ $thread->title }}</h5>
                            <p>{{ $thread->content }}</p>
                        </div>

                        <!-- Tombol Edit hanya untuk pemilik thread -->
                        @if ($thread->created_by === auth()->id())
                            <div class="d-flex gap-2 mt-2">
                                <div>
                                    <a href="{{ route('communities.threads.edit', ['community' => $community->id, 'thread' => $thread->id]) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                </div>
                                <form
                                    action="{{ route('communities.threads.destroy', ['community' => $community->id, 'thread' => $thread->id]) }}"
                                    method="POST" style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this thread?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('communities.index') }}" class="btn btn-secondary mt-3">Back to Communities</a>
@endsection
