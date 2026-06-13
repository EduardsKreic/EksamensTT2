@extends('layouts.sport')

@section('content')
<h1>{{ __('messages.trainers') }}</h1>
<div class="grid">
    @forelse($trainers as $trainer)
        <div class="card">
            @if($trainer->image_path)
                <img src="{{ asset('storage/' . $trainer->image_path) }}" alt="{{ $trainer->name }}" style="max-width:100%; border-radius:8px;">
            @endif
            <h2>{{ $trainer->name }}</h2>
            <p><strong>{{ __('messages.specialization') }}:</strong> {{ $trainer->specialization }}</p>
            <p>{{ $trainer->description }}</p>
        </div>
    @empty
        <div class="card">{{ __('messages.no_trainers') }}</div>
    @endforelse
</div>
@endsection
