@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-5 p-2">
                <div>
                    <h4 class="m-3 text-gradient">Edit Blog Post</h4>
                    <hr class="mx-3">
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text"
                                   class="rounded-5 form-control @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title"
                                   value="{{ old('title', $post->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="rounded-5 form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="8"
                                      required>{{ old('description', $post->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($post->image_path)
                            <div class="mb-3">
                                <label class="form-label">Current Image</label>
                                <div>
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="img-thumbnail rounded-5" style="max-width: 300px;">
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="image_path" class="form-label">{{ $post->image_path ? 'Replace Image (optional)' : 'Featured Image (optional)' }}</label>
                            <input type="file"
                                   class="rounded-5 form-control @error('image_path') is-invalid @enderror"
                                   id="image_path"
                                   name="image_path"
                                   accept="image/*">
                            @error('image_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary rounded-5">Cancel</a>
                            <button type="submit" class="btn btn-gradient rounded-5">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
