@extends('layouts.sport')

@section('content')
<h1>{{ __('messages.my_bookings') }}</h1>

<table>
    <thead>
        <tr>
            <th>{{ __('messages.class') }}</th>
            <th>{{ __('messages.date') }}</th>
            <th>{{ __('messages.time') }}</th>
            <th>{{ __('messages.status') }}</th>
            <th>{{ __('messages.actions') }}</th>
        </tr>
    </thead>

    <tbody>
        @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->classSession->title ?? '-' }}</td>

                <td>
                    {{ optional($booking->classSession->schedule)->class_date ?? '-' }}
                </td>

                <td>
                    {{ optional($booking->classSession->schedule)->start_time ?? '-' }}
                    -
                    {{ optional($booking->classSession->schedule)->end_time ?? '-' }}
                </td>

                <td>{{ $booking->status }}</td>

                <td>
                    @if($booking->status === 'active')
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit">
                                {{ __('messages.cancel') }}
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    {{ __('messages.no_bookings') }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection