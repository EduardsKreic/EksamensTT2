<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sport Club Booking') }}</title>
    <style>
    :root {
        --dark: #0f172a;
        --dark-2: #1e293b;
        --blue: #2563eb;
        --green: #16a34a;
        --bg: #eef2f7;
        --card: #ffffff;
        --border: #d7dde6;
        --text: #111827;
        --muted: #64748b;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: var(--bg);
        color: var(--text);
    }

    header {
        background: var(--dark);
        color: white;
        padding: 18px 42px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 4px solid var(--blue);
    }

    header strong {
        font-size: 22px;
        letter-spacing: .4px;
    }

    header a {
        color: white;
        text-decoration: none;
        margin-left: 18px;
        font-weight: 600;
    }

    header a:hover {
        color: #93c5fd;
    }

    main {
        max-width: 1180px;
        margin: 36px auto;
        padding: 0 24px;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 24px;
    }

    .filters {
        background: white;
        padding: 22px;
        border-radius: 4px;
        border: 1px solid var(--border);
        display: grid;
        grid-template-columns: 1.4fr 1fr 1fr 1fr;
        gap: 14px;
        margin-bottom: 26px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, .08);
    }

    input, select {
        padding: 13px;
        border: 1px solid #cbd5e1;
        border-radius: 3px;
        width: 100%;
        box-sizing: border-box;
        background: #fff;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .card {
        background: var(--card);
        border-radius: 4px;
        padding: 22px;
        margin-bottom: 18px;
        border: 1px solid var(--border);
        box-shadow: 0 2px 10px rgba(15, 23, 42, .08);
    }

    .card h2 {
        margin-top: 0;
        font-size: 25px;
        color: var(--dark);
    }

    .card p {
        line-height: 1.35;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 3px;
        border: 0;
        background: var(--blue);
        color: white;
        text-decoration: none;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-secondary {
        background: var(--dark-2);
    }

    .btn-danger {
        background: #dc2626;
    }

    .btn:hover {
        opacity: .9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid var(--border);
    }

    th {
        background: var(--dark);
        color: white;
    }

    th, td {
        padding: 13px;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    .muted {
        color: var(--muted);
    }

    .success {
        color: #15803d;
    }

    .error {
        color: #dc2626;
    }

    @media (max-width: 900px) {
        .filters {
            grid-template-columns: 1fr;
        }

        .grid {
            grid-template-columns: 1fr;
        }

        header {
            flex-direction: column;
            gap: 12px;
        }
    }
    .hero {
    background: linear-gradient(135deg, #0f172a, #2563eb);
    color: white;
    padding: 70px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,.15);
}

.hero h1 {
    color: white;
    font-size: 52px;
    margin-bottom: 16px;
}

.hero p {
    font-size: 20px;
    max-width: 700px;
    opacity: .95;
}

.hero-badge {
    display: inline-block;
    background: rgba(255,255,255,.15);
    padding: 8px 14px;
    border-radius: 20px;
    margin-bottom: 16px;
    font-size: 14px;
}

.hero-actions {
    margin-top: 24px;
    display: flex;
    gap: 12px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 30px;
    text-align: center;
    border-radius: 10px;
    border: 1px solid var(--border);
    box-shadow: 0 4px 16px rgba(0,0,0,.08);
}

.stat-card h2 {
    font-size: 42px;
    color: var(--blue);
    margin: 0;
}

.stat-card p {
    margin-top: 10px;
    color: var(--muted);
    font-weight: 600;
}

.card {
    transition: all .3s ease;
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0,0,0,.15);
}

.btn {
    transition: all .3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

@media (max-width: 900px) {
    .hero {
        padding: 40px 24px;
    }

    .hero h1 {
        font-size: 36px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}
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
     <a href="{{ route('profile') }}">{{ __('messages.profile') }}</a>
    @else
        <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
        <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
    @endauth

        <a href="{{ url('/locale/lv') }}">LV</a>
        <a href="{{ url('/locale/en') }}">EN</a>
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
@stack('scripts')
</body>
</html>
