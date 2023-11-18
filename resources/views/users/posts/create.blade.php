@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- cross-site request forgeries -->
    <div class="mb-3">
        <label for="category" class="form-label d-block fw-bold">Category
            <span class="text-muted fw-normal">(up to 3)</span>
        </label>
        @foreach($all_categories as $category)
        <div class="form-check form-check-inline">
            <input type="checkbox" name="category[]" value="{{ $category->id }}" id="{{ $category->name }}" class="form-check-input">
            <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
        </div>
        @endforeach
        <!-- Error -->
        @error('category')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="What's on your mind">{{ old('description')}}</textarea>
        <!-- Error -->
        @error('description')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="image" class="form-label fw-bold">Image</label>
        <input type="file" name="image" class="form-control" aria-describedby="image-info">
        <div id="image-info" class="form-text">
            Acceptable formats: jpeg, jpg, png, gif only<br>
            Max file size is 1048kB
        </div>
        <!-- Error -->
        @error('image')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary px-5">Post</button>
</form>

@endsection