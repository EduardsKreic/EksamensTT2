@extends('layouts.sport')

@section('content')
<h1>{{ __('messages.classes') }}</h1>

<div class="card">
    <div class="filters">
        <input id="search" type="text" placeholder="{{ __('messages.search') }}">
        <select id="category">
            <option value="">{{ __('messages.all_categories') }}</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select id="trainer">
            <option value="">{{ __('messages.all_trainers') }}</option>
            @foreach($trainers as $trainer)
                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
            @endforeach
        </select>
        <input id="date" type="date">
    </div>
</div>

<div id="class-list" class="grid">
    @include('classes.partials.list', ['classes' => $classes])
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/class-filter.js') }}"></script>
@endsection
