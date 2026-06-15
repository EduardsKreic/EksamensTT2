@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Edit Class</h1>

    <div class="mb-4">
        <a href="/admin/classes" class="btn btn-secondary">Back to Classes</a>
    </div>

    <form action="/admin/classes/{{ $class->id }}" method="POST" class="card">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $class->title) }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description', $class->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" required>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}"
                        @selected(old('trainer_id', $class->trainer_id) == $trainer->id)>
                        {{ $trainer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $class->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Schedule</label>
            <select name="schedule_id" required>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}"
                        @selected(old('schedule_id', $class->schedule_id) == $schedule->id)>
                        {{ $schedule->class_date }}
                        {{ $schedule->start_time }}
                        -
                        {{ $schedule->end_time }}
                        |
                        {{ $schedule->place }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Update Class
        </button>
    </form>
</div>
@endsection