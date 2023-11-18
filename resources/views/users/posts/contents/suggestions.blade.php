@if ($suggested_users)
    <div class="row">
        <div class="col-auto">
            <p class="fw-bold text-secondary">Suggestions For You</p>
        </div>
        <div class="col text-end">
            <a href="{{ route('suggested') }}" class="text-decoration-none text-dark fw-bold small">See all</a>
        </div>
    </div>

    @foreach (array_slice($suggested_users, 0, 10) as $user)
    <div class="row align-items-center mt-3">
        <div class="col-auto">
            <a href="{{ route('profile.show', $user->id) }}">
                @if ($user->avatar)
                    <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}" class="rounded-circle user-avatar">
                @else
                    <i class="fa-solid fa-circle-user text-secondary user-icon"></i>
                @endif
            </a>
        </div>
        <div class="col ps-0 text-truncate">
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold small">{{ $user->name }}</a>
        </div>
        <div class="col-auto">
            <form action="{{ route('follow.store', $user->id) }}" method="post" class="d-inline">
                @csrf
                <button type="submit" class="border-0 bg-transparent p-0 text-primary btn-sm">Follow</button>
            </form>
        </div>
    </div>
    @endforeach
@endif