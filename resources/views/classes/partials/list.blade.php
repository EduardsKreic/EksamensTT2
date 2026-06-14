@forelse($classes as $class)
    <div class="card">
        <h2>{{ $class->title }}</h2>
        <p>{{ $class->description }}</p>
        <p><strong>{{ __('messages.trainer') }}:</strong> {{ $class->trainer->name ?? '-' }}</p>
        <p><strong>{{ __('messages.category') }}:</strong> {{ $class->category->name ?? '-' }}</p>
        <p><strong>{{ __('messages.date') }}:</strong> {{ optional($class->schedule)->class_date }} </p>
        <p><strong>{{ __('messages.time') }}:</strong> {{ optional($class->schedule)->start_time }} - {{ optional($class->schedule)->end_time }}</p>
        <p><strong>{{ __('messages.hall') }}:</strong> {{ optional($class->schedule)->hall }}</p>
        <p><strong>{{ __('messages.available_places') }}:</strong> {{ $class->schedule->available_places ?? '-' }}</p>
      <a class="btn-secondary btn" href="{{ url('/classes/' . $class->id) }}">{{ __('messages.details') }}</a>
   @auth
    <form action="{{ url('/bookings') }}" method="POST" style="display:inline;">
        @csrf
        <button class="btn" type="submit">{{ __('messages.book') }}</button>
    </form>
@endauth
    </div>
@empty
    <div class="card">{{ __('messages.no_classes') }}</div>
@endforelse
