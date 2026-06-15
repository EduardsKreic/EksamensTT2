@extends('layouts.sport')

@section('content')
<div class="container">
    <h1>Add Schedule</h1>

    <a href="/admin/schedules" class="btn btn-secondary mb-3">Back to Schedules</a>

    <form action="/admin/schedules" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="class_date">Date</label>
            <input type="date" name="class_date" id="class_date" class="form-control" value="{{ old('class_date') }}" required>
            @error('class_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="place">Place</label>
            <input type="text" name="place" id="place" class="form-control" value="{{ old('place') }}" required>
            @error('place')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="available_places">Available Places</label>
            <input type="number" name="available_places" id="available_places" class="form-control" value="{{ old('available_places') }}" min="1" required>
            @error('available_places')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Schedule</button>
    </form>
</div>
@endsection