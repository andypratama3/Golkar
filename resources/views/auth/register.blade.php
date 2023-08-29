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
        background: #ffeb3b ;
        overflow: hidden;
    }
    .backround img {
        width: auto;
        border-radius: 30px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding-top: 80px;
        transform: scale(1.2);
    }

    .backround .form-group{
        width: 20%;
        margin: 0 auto 10px;
        /* border: 2px white solid; */
        transform: translateX(185px);
    }

    .backround .input{
        /* border: 2px solid blue; */
        transform: translateY(-385px);
    }
</style>

<body>
    <div class="backround">
        <img src="{{ asset('assets_dashboard/img/bg.png') }}" alt="">
        <div class="input">
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input class="form-control form-control-sm" type="text">
            </div>
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input class="form-control form-control-sm" type="text">
            </div>
            <div class="form-group">
                <a href="" class="btn btn-dark btn-sm">Masuk</a>
                <a href="" class="btn btn-dark btn-sm">Daftar</a>
                <a href="" class="btn btn-dark btn-sm">Lupa Password?</a>
            </div>

        </div>
    </div>
</body>

</html>
