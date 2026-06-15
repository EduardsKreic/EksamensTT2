@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Edit Trainer</h1>

    <div class="mb-4">
        <a href="/admin/trainers" class="btn btn-secondary">Back to Trainers</a>
    </div>

    <form action="/admin/trainers/{{ $trainer->id }}" method="POST" class="card">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $trainer->name) }}" required>
        </div>

        <div class="form-group">
            <label>Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization', $trainer->specialization) }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description', $trainer->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Trainer</button>
    </form>
</div>
@endsection