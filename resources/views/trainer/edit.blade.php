@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>Edit Class</h1>

    <form action="{{ route('trainer.classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ old('title', $class->title) }}"
                   required>

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      required>{{ old('description', $class->description) }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="{{ route('trainer.classes') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection