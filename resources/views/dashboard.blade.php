@extends('layouts.sport')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Admin Panel</h1>

    <div class="grid">

        <div class="card">
            <h2>Classes</h2>
            <p>Add, edit and delete sport classes.</p>
            <a href="/admin/classes" class="btn">Manage Classes</a>
        </div>

        <div class="card">
            <h2>Trainers</h2>
            <p>Manage trainers and their specializations.</p>
            <a href="/admin/trainers" class="btn">Manage Trainers</a>
        </div>

        <div class="card">
            <h2>Schedules</h2>
            <p>Manage class dates, times and places.</p>
            <a href="/admin/schedules" class="btn">Manage Schedules</a>
        </div>

        <div class="card">
            <h2>Users</h2>
            <p>Manage users, roles, block and unblock accounts.</p>
            <a href="/admin/users" class="btn">Manage Users</a>
        </div>

        <div class="card">
            <h2>Bookings</h2>
            <p>View all bookings in the system.</p>
            <a href="/bookings" class="btn">View Bookings</a>
        </div>

        <div class="card">
            <h2>Statistics</h2>
            <p>Total users: {{ $statistics['users'] }}</p>
            <p>Total trainers: {{ $statistics['trainers'] }}</p>
            <p>Total categories: {{ $statistics['categories'] }}</p>
            <p>Total schedules: {{ $statistics['schedules'] }}</p>
            <p>Total classes: {{ $statistics['classes'] }}</p>
            <p>Total bookings: {{ $statistics['bookings'] }}</p>
        </div>

    </div>

    <div class="grid" style="margin-top: 24px;">

        <div class="card">
            <h2>Latest Users</h2>

            @forelse($latestUsers as $user)
                <p>
                    {{ $user->name }}
                    ({{ $user->email }})
                    — {{ $user->role->name ?? 'No role' }}
                </p>
            @empty
                <p>No users found.</p>
            @endforelse
        </div>

        <div class="card">
            <h2>Latest Bookings</h2>

            @forelse($latestBookings as $booking)
                <p>
                    {{ $booking->user->name ?? '-' }}
                    →
                    {{ $booking->classSession->title ?? '-' }}
                    —
                    {{ ucfirst($booking->status) }}
                </p>
            @empty
                <p>No bookings found.</p>
            @endforelse
        </div>

        <div class="card">
            <h2>Admin Requirements</h2>
            <p>Administrator can manage classes, trainers, users and schedules.</p>
            <p>Administrator can block and unblock users.</p>
        </div>

    </div>

</div>
@endsection