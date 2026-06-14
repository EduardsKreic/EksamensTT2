@forelse($classes as $class)
    <div class="card">
        <h2>{{ $class->title }}</h2>
        <p>{{ $class->description }}</p>
        <p><strong>{{ __('messages.trainer') }}:</strong> {{ $class->trainer->name ?? '-' }}</p>
        <p><strong>{{ __('messages.category') }}:</strong> {{ $class->category->name ?? '-' }}</p>
        <p><strong>{{ __('messages.date') }}:</strong> {{ optional($class->schedule)->class_date }} </p>
        <p><strong>{{ __('messages.time') }}:</strong> {{ optional($class->schedule)->start_time }} - {{ optional($class->schedule)->end_time }}</p>
        <p><strong>{{ __('messages.hall') }}:</strong> {{ optional($class->schedule)->place ?? 'Nav norādīta' }}</p>
        <p><strong>{{ __('messages.available_places') }}:</strong> {{ $class->schedule->available_places ?? '-' }}</p>
      <a class="btn-secondary btn" href="{{ url('/classes/' . $class->id) }}">{{ __('messages.details') }}</a>
   @auth
   @auth
    <form action="{{ route('bookings.store') }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="class_session_id" value="{{ $class->id }}">
        <button class="btn" type="submit">{{ __('messages.book') }}</button>
    </form>
@endauth
@endauth
    </div>
@empty
    <div class="card">{{ __('messages.no_classes') }}</div>
@endforelse
