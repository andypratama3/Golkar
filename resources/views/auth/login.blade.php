{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Golkar || @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- CSRF TOKEN -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
        <link href="{{ asset('assets_dashboard/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets_dashboard/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets_dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets_dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets_dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets_dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        @stack('css')
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets_dashboard/css/style.css') }}" rel="stylesheet">
    </head>


</head>
<style>
    body {
        min-height: 100vh;
        background: #ffeb3b;
        overflow: hidden;
    }

    .backround .img-top img {
        width: 600px;
        border-radius: 30px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-top: 100px;
        margin-bottom: 350px;
        ;
        transform: scale(1.2);
    }

    .backround .img-bottom img {
        width: 400px;
        border-radius: 30px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-top: 10px;
        transform: scale(1.2);
    }

    .backround .form-group {
        width: 20%;
        margin: 0 auto 10px;
        transform: translateX(10px);
    }

    .backround .input {
        transform: translateY(-320px);
    }
</style>

<body>
    <div class="backround">
        <div class="img-top">
            <img src="{{ asset('assets_dashboard/img/top.jpg') }}" alt="" class="img-top">
        </div>
        <div class="img-bottom">
            <img src="{{ asset('assets_dashboard/img/bottom.jpg') }}" alt="" class="img-bottom">
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input">
                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="username">password</label>
                    <input class="form-control form-control-sm" type="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                <button class="btn btn-dark btn-sm text-center" type="submit">Masuk</button>
                    <a href="{{ route('register') }}" class="btn btn-dark btn-sm">Daftar</a>
                    <a href="{{ route('password.request') }}" class="btn btn-dark btn-sm">Lupa Password?</a>

                </div>
        </form>
    </div>
    </div>
</body>

</html>
