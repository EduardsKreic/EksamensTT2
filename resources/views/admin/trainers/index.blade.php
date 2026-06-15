@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Manage Trainers</h1>

    <div class="mb-4">
        <a href="/admin" class="btn btn-secondary">Back to Admin</a>
        <a href="/admin/trainers/create" class="btn btn-success">Add New Trainer</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialization</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->specialization }}</td>
                    <td>{{ $trainer->description }}</td>
                    <td>
                        <div class="actions">
                            <a href="/admin/trainers/{{ $trainer->id }}/edit" class="btn">Edit</a>

                            <form action="/admin/trainers/{{ $trainer->id }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Delete this trainer?')">
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