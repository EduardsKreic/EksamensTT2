@extends('layouts.sport')

@section('content')
<div class="card">
    <h1>Trainer Dashboard</h1>

    <p><strong>Name:</strong> {{ $trainer->name }}</p>
    <p><strong>Specialization:</strong> {{ $trainer->specialization }}</p>
    <p><strong>My classes:</strong> {{ $classesCount }}</p>

    <a href="{{ route('trainer.classes') }}" class="btn">View My Classes</a>
</div>
@endsection