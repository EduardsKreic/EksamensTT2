@extends('layouts.sport')

@section('content')
<div class="container py-4">
    <h1>Add New Class</h1>

    <div class="mb-4">
        <a href="/admin/classes" class="btn btn-secondary">Back to Classes</a>
    </div>

    <form action="/admin/classes" method="POST" class="card">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Trainer</label>
            <select name="trainer_id" required>
                <option value="">Choose trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">
                        {{ $trainer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                <option value="">Choose category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Schedule</label>
            <select name="schedule_id" required>
                <option value="">Choose schedule</option>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">
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
            Save Class
        </button>
    </form>
</div>
@endsection