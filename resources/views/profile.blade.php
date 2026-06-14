@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>{{ __('messages.profile') }}</h1>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
</div>
@endsection