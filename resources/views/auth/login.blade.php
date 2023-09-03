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
    @media (max-width: 768px) {
        .background .img-top{
            position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        object-fit: cover;

        }
        /* Adjust the layout for screens with a maximum width of 768px (e.g., tablets) */
        .background .grid-form {
            transform: translateX(10px);

            grid-template-areas:
                "name"
                "password"
                "email"
                "confirm-password"
                "username register"; /* Combine the username and register fields */
        }
    }

    @media (max-width: 576px) {
        /* Adjust the layout for screens with a maximum width of 576px (e.g., mobile devices) */
        .background .grid-form {
            width: 100%; /* Adjust the width for even smaller screens */
        }
    }

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
                        @error('username')
                            <p style="color: black">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="password">
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control form-control-sm" type="password" name="password">
                        @error('password')
                            <p style="color: black">{{ $message }}</p>
                        @enderror
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
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Apply the background image */
        body {
            background-image: url('{{ asset('assets_dashboard/img/bg.jpg') }}'); /* Replace with your image URL or path */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Style the login box */
        .login-box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Style form elements */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html> --}}
