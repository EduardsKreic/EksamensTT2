@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Add New Trainer</h1>

    <div class="mb-4">
        <a href="/admin/trainers" class="btn btn-secondary">Back to Trainers</a>
    </div>

    <form action="/admin/trainers" method="POST" class="card">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization') }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Trainer</button>
    </form>
</div>
@endsection