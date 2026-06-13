@extends('layouts.sport')

@section('content')
<h1>{{ __('messages.admin_panel') }}</h1>
<div class="grid">
    <div class="card">
        <h2>{{ __('messages.classes') }}</h2>
        <p>{{ __('messages.manage_classes_text') }}</p>
        <a class="btn" href="{{ route('classes.index') }}">{{ __('messages.open') }}</a>
    </div>
    <div class="card">
        <h2>{{ __('messages.audit_logs') }}</h2>
        <p>{{ __('messages.audit_logs_text') }}</p>
    </div>
</div>
@endsection
