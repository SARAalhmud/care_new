@extends('layouts.navigation')
@section('nav')
@if (session('success'))
    <div class="alert alert-success" style="background-color: white; border: 1px solid #28a745; color: #28a745;">
        {{ session('success') }}
    </div>
@endif
@auth
@if(auth()->check() && auth()->user()->role !== 'user')
    <a href="{{ route('dashboard.index') }}" class="btn btn-warning fw-bold px-4">
        {{ __('messages.add_car') }}
    </a>
    <hr>
@endif

@endauth
<div class="container mt-5">
    <div class="card shadow-lg border-0 p-4 rounded-4">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle border border-3 border-warning shadow" width="120">
            <h3 class="mt-3 fw-bold text-dark">{{ $user->name }}</h3>
            <p class="text-muted">{{ $user->email }}</p>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                {{ __('messages.member_since') }}  {{ $user->created_at->diffForHumans() }}
            </span>
        </div>

        <hr class="my-4">

        <h4 class="fw-bold text-dark mb-3"><i class="bi bi-star-fill text-warning me-2"></i>{{ __('messages.my_ratings') }} :</h4>
        @forelse($user->ratings as $rating)
            <div class="bg-light p-3 rounded mb-3 border-start border-4 border-warning shadow-sm">
                <strong class="text-warning fs-5">⭐ {{ $rating->rating }}</strong>
                <p class="mb-1">{{ $rating->comment }}</p>
                <small class="text-muted">{{ $rating->created_at->format('Y-m-d') }}</small>
            </div>
        @empty
            <p class="text-muted">{{ __('messages.rating') }}    .</p>
        @endforelse

        <hr class="my-4">

        <h5 class="fw-bold text-dark mb-3"> {{ __('messages.add_new_rating') }} :</h5>
        <form action="{{ route('profile.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rating" class="form-label">{{ __('messages.rating') }} </label>
                <select class="form-select" name="rating" id="rating" required>
                    <option value="">{{ __('messages.rating_d') }}  </option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">⭐ {{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">{{ __('messages.comment') }} :</label>
                <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="اكتب تعليقك هنا..." required></textarea>
            </div>

            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <button type="submit" class="btn btn-warning fw-bold px-4">{{ __('messages.submit_rating') }}  </button>
        </form>
    </div>


</div>
@endsection
