@extends('layouts.sport')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">User Management</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th width="180">Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? 'No Role' }}</td>

                <td>
                    @if($user->is_blocked)
                        <span class="badge bg-danger">Blocked</span>
                    @else
                        <span class="badge bg-success">Active</span>
                    @endif
                </td>

                <td>
                    @if(!$user->is_blocked)
                        <form action="/admin/users/{{ $user->id }}/block" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger btn-sm">
                                Block
                            </button>
                        </form>
                    @else
                        <form action="/admin/users/{{ $user->id }}/unblock" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">
                                Unblock
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