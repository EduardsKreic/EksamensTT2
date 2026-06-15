@extends('layouts.sport')

@section('content')
<h1>My Classes</h1>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Time</th>
            <th>Place</th>
            <th>Participants</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($classes as $class)
            <tr>
                <td>{{ $class->title }}</td>
                <td>{{ $class->category->name ?? '-' }}</td>
                <td>{{ $class->schedule->class_date ?? '-' }}</td>
                <td>
                    @if($class->schedule)
                        {{ $class->schedule->start_time }} - {{ $class->schedule->end_time }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $class->schedule->place ?? '-' }}</td>
                <td>{{ $class->bookings->where('status', 'active')->count() }}</td>
                <td>
                    <a href="{{ route('trainer.classes.show', $class->id) }}" class="btn">View</a>
                    <a href="{{ route('trainer.classes.edit', $class->id) }}" class="btn btn-secondary">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No classes assigned to you.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection