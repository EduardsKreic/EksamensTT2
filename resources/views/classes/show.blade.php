@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>{{ $class->title }}</h1>
    <p>{{ $class->description }}</p>
    <p><strong>{{ __('messages.trainer') }}:</strong> {{ $class->trainer->name ?? '-' }}</p>
    <p><strong>{{ __('messages.category') }}:</strong> {{ $class->category->name ?? '-' }}</p>
    <p><strong>{{ __('messages.date') }}:</strong> {{ optional($class->schedule)->class_date ?? '-' }}</p>
    <p><strong>{{ __('messages.time') }}:</strong> {{ optional($class->schedule)->start_time }} - {{ optional($class->schedule)->end_time }}</p>
    <p><strong>{{ __('messages.hall') }}:</strong> {{ optional($class->schedule)->hall ?? '-' }}</p>
    <p><strong>{{ __('messages.available_places') }}:</strong> {{ optional($class->schedule)->available_places ?? '-' }}</p>

    @auth
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="class_session_id" value="{{ $class->id }}">
            <button class="btn" type="submit">{{ __('messages.book') }}</button>
        </form>
    @else
        <p class="muted">{{ __('messages.login_to_book') }}</p>
    @endauth
</div>
@endsection