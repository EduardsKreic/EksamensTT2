@extends('layouts.sport')

@section('content')
<section class="hero">
    <div>
        <span class="hero-badge">Sport Club Booking</span>

        <h1>{{ __('messages.welcome') }}</h1>

        <p>
            {{ __('messages.home_text') }}
        </p>

        <div class="hero-actions">
            <a class="btn" href="{{ route('classes.index') }}">
                {{ __('messages.view_classes') }}
            </a>

            <a class="btn btn-secondary" href="{{ route('trainers.index') }}">
                {{ __('messages.trainers') }}
            </a>
        </div>
    </div>
</section>

<<section class="stats-grid">
    <div class="stat-card">
        <h2>{{ $classesCount }}</h2>
        <p>Classes</p>
    </div>

    <div class="stat-card">
        <h2>{{ $trainersCount }}</h2>
        <p>Trainers</p>
    </div>

    <div class="stat-card">
        <h2>{{ $bookingsCount }}</h2>
        <p>Bookings</p>
    </div>
</section>
@endsection