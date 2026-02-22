@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-secondary">
                    &larr; Back to Events
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-3">{{ $event->title }}</h1>
                    <h5>
                        <span class="fw-bold">Date:</span> {{ $event->date->format('M d, Y') }}
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-muted">
                            <small>
                                By <strong>{{ $event->user->name }}</strong> |
                                {{ $event->created_at->format('F j, Y \a\t g:i a') }}
                                @if($event->created_at != $event->updated_at)
                                    <span class="ms-2">(Updated: {{ $event->updated_at->format('M d, Y') }})</span>
                                @endif
                            </small>
                        </div>
                        @can('update', $event)
                            <div>
                                <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <div class="card-text">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
