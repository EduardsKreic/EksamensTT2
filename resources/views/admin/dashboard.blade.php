@extends('layouts.sport')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Admin Panel</h1>

    <div class="grid">

        <div class="card">
            <h2>Users</h2>
            <p>
                Manage users, block and unblock accounts.
            </p>

            <a href="/admin/users" class="btn">
                Open
            </a>
        </div>

        <div class="card">
            <h2>Classes</h2>
            <p>
                Manage classes, trainers and schedules.
            </p>

            <a href="/admin/classes/create" class="btn">
                Open
            </a>
        </div>

        <div class="card">
            <h2>Statistics</h2>

            <p>Total users: {{ $statistics['users'] }}</p>
            <p>Total trainers: {{ $statistics['trainers'] }}</p>
            <p>Total classes: {{ $statistics['classes'] }}</p>
            <p>Total bookings: {{ $statistics['bookings'] }}</p>
        </div>

        <div class="card">
            <h2>Latest Users</h2>

            @foreach($latestUsers as $user)
                <p>
                    {{ $user->name }}
                    ({{ $user->email }})
                </p>
            @endforeach
        </div>

        <div class="card">
            <h2>Latest Bookings</h2>

            @foreach($latestBookings as $booking)
                <p>
                    {{ $booking->user->name ?? '-' }}
                    →
                    {{ $booking->classSession->title ?? '-' }}
                </p>
            @endforeach
        </div>

        <div class="card">
            <h2>Audit Logs</h2>

            <p>
                Important user and administrator actions are stored in the system.
            </p>
        </div>

    </div>

</div>
@endsection