<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Golkar || Login</title>
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
    body{
        overflow: hidden;
    }
    .background {
        position: relative;
        width: 100%;
        height: 100vh;
        /* This sets the height to 100% of the viewport height */

    }

    .background .img-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        object-fit: cover;
        /* This ensures the image covers the entire div */
    }

    .background .form-group {
        width: 100%;
    }

    .background .grid-form{
        width: 60%;
        height: auto;
        transform: translateX(250px);
        display: grid;
        margin: 0 auto;
        justify-content: left;
        align-items: center;
        grid-template-areas:
        "name password"
        "email confirm-password"
        "username register";
    }

    .background input{
        width: 300px;
    }

    /* .background .grid-form .button{
        border: 2px red solid;
        position: absolute;
        width: 300px;
        grid-template-areas:
        "btn-register btn-login btn-forget-pw";
        grid-template-columns: 4fr;
        bottom: 0;

    } */
</style>

<body>
    <div class="background">
        <img src="{{ asset('assets_dashboard/img/bg.jpg') }}" alt="" class="img-top">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row grid-form">
                <div class="username">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control form-control-sm" type="text" name="username">
                    </div>
                </div>
                <div class="password">
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control form-control-sm" type="password" name="password">
                    </div>
                </div>
                <br><br>
                <div class="register">
                    <div class="button">
                        <button class="btn btn-dark btn-sm btn-register" type="submit">Masuk</button>
                        <a href="{{ route('register') }}" class="btn btn-dark btn-sm btn-login">Daftar</a>
                        <a href="{{ route('password.request') }}" class="btn btn-dark btn-sm btn-forget-pw">Lupa Password?</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>

</html>
