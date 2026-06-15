@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>User Management</h1>

    <div class="mb-4">
        <a href="/admin" class="btn btn-secondary">Back to Admin Dashboard</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? 'No role' }}</td>

                    <td>
                        @if($user->is_blocked)
                            <span style="color: #dc2626; font-weight: 700;">
                                Blocked
                            </span>
                        @else
                            <span style="color: #16a34a; font-weight: 700;">
                                Active
                            </span>
                        @endif
                    </td>

                    <td>
                        @if($user->is_blocked)
                            <form action="/admin/users/{{ $user->id }}/unblock" method="POST" class="inline-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">
                                    Unblock
                                </button>
                            </form>
                        @else
                            <form action="/admin/users/{{ $user->id }}/block" method="POST" class="inline-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">
                                    Block
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection