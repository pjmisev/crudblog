@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Events</h2>
                    <p class="text-muted mb-0">Discover events from our community</p>
                </div>
                @auth
                    <a href="{{ route('events.create') }}" class="btn btn-gradient rounded-5">Create New Event</a>
                @endauth
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @forelse($events as $event)
                <div class="card mb-4 shadow rounded-5">
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{ route('events.show', $event) }}" class="text-decoration-none text-gradient">
                                {{ $event->title }}
                            </a>
                        </h3>
                        <h5>
                            <span class="fw-bold">Date:</span> {{ $event->date->format('M d, Y') }}
                        </h5>
                        <p class="text-muted small">
                            By {{ $event->user->name }} | Created: {{ $event->created_at->format('M d, Y') }}
                        </p>
                        <p class="card-text">{{ Str::limit($event->description, 200) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-outline-gradient rounded-5">Read More</a>
                            @can('update', $event)
                                <div>
                                    <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-outline-gradient rounded-5">Edit</a>
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-5" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <p class="mb-0">No events found. @auth <a href="{{ route('events.create') }}">Create the first event!</a> @endauth</p>
                </div>
            @endforelse

            <div class="d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
