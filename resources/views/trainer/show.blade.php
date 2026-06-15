@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>{{ $class->title }}</h1>

    <p><strong>Description:</strong> {{ $class->description }}</p>
    <p><strong>Category:</strong> {{ $class->category->name ?? '-' }}</p>

    @if($class->schedule)
        <p><strong>Date:</strong> {{ $class->schedule->class_date }}</p>
        <p><strong>Time:</strong> {{ $class->schedule->start_time }} - {{ $class->schedule->end_time }}</p>
        <p><strong>Place:</strong> {{ $class->schedule->place }}</p>
    @endif

    <a href="{{ route('trainer.classes.edit', $class->id) }}" class="btn">Edit Class</a>
    <a href="{{ route('trainer.classes') }}" class="btn btn-secondary">Back</a>
</div>

<h2>Participants</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($class->bookings as $booking)
            <tr>
                <td>{{ $booking->user->name ?? '-' }}</td>
                <td>{{ $booking->user->email ?? '-' }}</td>
                <td>{{ $booking->status }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No participants yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection