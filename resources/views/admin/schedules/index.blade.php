@extends('layouts.sport')

@section('content')
<div class="container">
    <h1>Schedule Management</h1>

    <a href="/admin" class="btn btn-secondary mb-3">Back to Admin Dashboard</a>
    <a href="/admin/schedules/create" class="btn btn-primary mb-3">Add Schedule</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Place</th>
                <th>Available Places</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->class_date }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->place }}</td>
                    <td>{{ $schedule->available_places }}</td>
                    <td>
                        <a href="/admin/schedules/{{ $schedule->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                        <form action="/admin/schedules/{{ $schedule->id }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this schedule?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No schedules found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection