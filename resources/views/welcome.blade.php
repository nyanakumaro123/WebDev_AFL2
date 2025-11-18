<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'HoopsCloth') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .auth-container {
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=2069');
            background-size: cover;
            background-position: center;
        }

        .auth-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .welcome-header {
            color: white;
            text-align: center;
            margin-bottom: 2rem;
        }

        .welcome-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .welcome-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .btn-custom {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid #1b1b18;
        }

        .btn-primary-custom {
            background-color: white;
            color: #1b1b18;
        }

        .btn-primary-custom:hover {
            background-color: #1b1b18;
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-custom {
            background-color: white;
            color: #1b1b18;
        }

        .btn-outline-custom:hover {
            background-color: #1b1b18;
            color: white;
            transform: translateY(-2px);
        }

        .feature-list {
            list-style: none;
            padding-left: 0;
        }

        .feature-list li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
        }

        .feature-list li:before {
            content: "✓";
            color: #f53003;
            font-weight: bold;
            margin-right: 0.75rem;
        }

        .laravel-logo {
            max-width: 200px;
            margin: 0 auto 1.5rem;
            display: block;
        }
    </style>
</head>

<body class="auth-container">
    <div class="container d-flex flex-column justify-content-center min-vh-100 py-5">
        <div class="welcome-header">
            <h1>Welcome to {{ config('app.name', 'HoopsCloth') }}</h1>
            <p>Get amazing experience with the HoopsCloth Store</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @if (Route::has('login'))
                    <div class="text-center mb-4">
                        @auth
                            <a href="{{ url('/index') }}" class="btn btn-primary-custom btn-custom w-50 mb-3">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary-custom btn-custom w-50 mb-3">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-custom btn-custom w-50">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
