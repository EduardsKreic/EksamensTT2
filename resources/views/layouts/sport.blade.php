<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sport Club Booking') }}</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f8; color: #222; }
        header { background: #111827; color: white; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: white; text-decoration: none; margin-left: 14px; }
        main { max-width: 1100px; margin: 30px auto; padding: 0 20px; }
        .card { background: white; border-radius: 10px; padding: 18px; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px; }
        .btn { display: inline-block; padding: 10px 14px; border-radius: 8px; border: 0; background: #2563eb; color: white; text-decoration: none; cursor: pointer; }
        .btn-danger { background: #dc2626; }
        .btn-secondary { background: #4b5563; }
        .filters { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; margin-bottom: 20px; }
        input, select { padding: 10px; border: 1px solid #d1d5db; border-radius: 8px; width: 100%; box-sizing: border-box; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        .muted { color: #6b7280; }
        .success { color: #15803d; }
        .error { color: #dc2626; }
    </style>
</head>
<body>
<header>
    <div><strong>Sport Club</strong></div>
    <nav>
        <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
        <a href="{{ route('classes.index') }}">{{ __('messages.classes') }}</a>
        <a href="{{ route('trainers.index') }}">{{ __('messages.trainers') }}</a>
        @auth
            <a href="{{ route('bookings.index') }}">{{ __('messages.my_bookings') }}</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
            <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
        @endauth
        <a href="{{ route('locale.switch', 'lv') }}">LV</a>
        <a href="{{ route('locale.switch', 'en') }}">EN</a>
    </nav>
</header>
<main>
    @if(session('success'))
        <div class="card success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="card error">{{ session('error') }}</div>
    @endif
    @yield('content')
</main>
@yield('scripts')
</body>
</html>
