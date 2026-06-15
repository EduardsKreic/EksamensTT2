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

<section class="stats-grid">
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

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 30px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        text-align: center;
    }

    .stat-card h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .stat-card p {
        margin: 0;
    }
</style>
@endsection