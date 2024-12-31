@extends('layouts.app')

@section('title', 'Communities')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Communities</h1>
        <a href="{{ route('communities.create') }}" class="btn btn-primary">Create Community</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap">
        @foreach ($communities as $community)
            <div class="mx-2 mb-4">
                <div class="card shadow-sm" style="width: 18rem; height: 20rem;">
                    @if ($community->image)
                        <img src="{{ asset('storage/' . $community->image) }}" class="card-img-top"
                            alt="{{ $community->name }}" style="height: 10rem; object-fit: cover;">
                    @else
                        <img src="https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg?s=612x612&w=0&k=20&c=v48RE0ZNWpMZOlSp13KdF1yFDmidorO2pZTu2Idmd3M="
                            class="card-img-top" alt="No Image" style="height: 10rem; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column mt-auto">
                        <div class="mt-auto">
                            <h5 class="card-title fw-semibold">{{ $community->name }}</h5>
                            <p class="card-text text-truncate">{{ $community->description }}</p>
                        </div>
                        <div class="d-flex justify-content-start mt-3 gap-2">
                            @php
                                $isParticipant = $community->isParticipant(auth()->id()); // Cek apakah user adalah participant
                                $isAdmin = $community->isAdmin(auth()->id()); // Cek apakah user adalah admin
                            @endphp

                            @if (!$isParticipant)
                                <!-- Tombol Join -->
                                <form action="{{ route('communities.join', $community) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success">Join</button>
                                </form>
                            @else
                                <!-- Tombol View -->
                                <a href="{{ route('communities.show', $community) }}" class="btn btn-sm btn-info">View</a>
                                <!-- Tombol Leave -->
                                @if (!$isAdmin)
                                    <form action="{{ route('communities.leave', $community) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Leave</button>
                                    </form>
                                @endif
                            @endif

                            @if ($isAdmin)
                                <!-- Tombol Edit dan Delete untuk Admin -->
                                <a href="{{ route('communities.edit', $community) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('communities.destroy', $community) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
