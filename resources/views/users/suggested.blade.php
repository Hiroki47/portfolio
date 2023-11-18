@extends('layouts.app')

@section('title', 'Suggestions For You')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            {{-- show all suggested users --}}
            <p class="fw-bold">Suggested</p>
        
            @foreach ($suggested_users as $user)
            <div class="row align-items-center mt-3">
                <div class="col-auto">
                    <a href="{{ route('profile.show', $user->id) }}">
                        @if ($user->avatar)
                            <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}" class="rounded-circle suggested-avatar">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary suggested-icon"></i>
                        @endif
                    </a>
                </div>
                <div class="col ps-0 text-truncate">
                    <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                    {{-- <span class="text-muted d-block">{{ $user->email }}</span> --}}
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                    @if ($user->isFollowingMe())
                        <p class="text-muted mb-0 small">Follows you</p>                 
                    @else
                        @if ($user->followers->count() == 0)
                            <p class="text-muted mb-0 small">No followers yet</p>
                        @else
                            <p class="text-muted mb-0 small">Followed by {{ $user->followers->count() }} {{ $user->followers->count() == 1 ? 'user' : 'users' }}</p>
                        @endif
                    @endif
                </div>
                <div class="col-auto align-self-center">
                    <form action="{{ route('follow.store', $user->id) }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                    </form>
                </div>
            </div>
            @endforeach
            {{-- 
                SUBTITLE:
                1. Follows you
                2. No followers yet
                3. Followed by /# of followers/ 
            --}}
        </div>
    </div>

@endsection