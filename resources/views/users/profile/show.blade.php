@extends('layouts.app')

@section('title', 'Profile')

@section('content')
@include('users.profile.header')

<!-- {{-- Show all posts here --}} -->
<div style="margin-top: 100px">
    @if ($user->posts->isNotEmpty())
        <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-4 mb-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="grid-img">
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <h3 class="text-muted text-center">No posts yet.</h3>
    @endif
</div>
@endsection

<!-- Add more  -->