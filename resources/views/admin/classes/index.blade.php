@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Manage Classes</h1>

    <div class="mb-4">
        <a href="/admin" class="btn btn-secondary">Back to Admin</a>
        <a href="/admin/classes/create" class="btn btn-success">Add New Class</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Trainer</th>
                <th>Category</th>
                <th>Date</th>
                <th>Time</th>
                <th>Place</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->title }}</td>
                    <td>{{ $class->trainer->name ?? '-' }}</td>
                    <td>{{ $class->category->name ?? '-' }}</td>
                    <td>{{ $class->schedule->class_date ?? '-' }}</td>
                    <td>
                        {{ $class->schedule->start_time ?? '-' }}
                        -
                        {{ $class->schedule->end_time ?? '-' }}
                    </td>
                    <td>{{ $class->schedule->place ?? '-' }}</td>
                    <td>
                        <div class="actions">
                            <a href="/admin/classes/{{ $class->id }}/edit" class="btn">Edit</a>

                            <form action="/admin/classes/{{ $class->id }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Delete this class?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection