@extends('layouts.sport')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row g-3 mb-5">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['users'] }}</h3>
                    <p>Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['trainers'] }}</h3>
                    <p>Trainers</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['categories'] }}</h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['schedules'] }}</h3>
                    <p>Schedules</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['classes'] }}</h3>
                    <p>Classes</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <h3>{{ $statistics['bookings'] }}</h3>
                    <p>Bookings</p>
                </div>
            </div>
        </div>
    </div>

    <h3>Latest Users</h3>

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? 'No Role' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Latest Bookings</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Class</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestBookings as $booking)
                <tr>
                    <td>{{ $booking->user->name ?? '-' }}</td>
                    <td>{{ $booking->classSession->title ?? '-' }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection