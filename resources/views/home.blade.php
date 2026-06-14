@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>{{ __('messages.welcome') }}</h1>
    <p>{{ __('messages.home_text') }}</p>
    <a class="btn" href="{{ route('classes.index') }}">{{ __('messages.view_classes') }}</a>
</div>
@endsection
