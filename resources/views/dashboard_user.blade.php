<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <title>Rental Cuan</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <style>
        .card-img-fluid {
            width: auto;
            height: auto;
            position: relative;
        }

        .caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 15px;
            text-align: center;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            width: 80%;
            z-index: 1;
        }

        .carousel-img {
            width: 100%;
            height: auto;
        }

        .welcome-bg {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }

        body {
            background-image: url('https://media.istockphoto.com/id/1349189565/vector/colorless-palette-with-several-shades-of-white.jpg?s=612x612&w=0&k=20&c=zEb4B9PkwpqOv9KogMvtIhWA1suOXcMl6JKkAtAvm-Y=');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .badge-dark-light {
            background-color: #F1EFEF;
            color: #000;
        }

        .card-img-fixed {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
            <a class="navbar-brand mx-4" href="#">
                <img src="{{ asset('https://pngimg.com/d/letter_r_PNG93920.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Car Rental Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home_user') }}" style="color: white;">
                            <i class="fas fa-home" style="color: white;"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/car_user') }}" style="color: white;">
                            <i class="fas fa-car" style="color: white;"></i> Cars
                        </a>
                    </li>
                    <li class="nav-item dropdown"> <!-- Add 'dropdown' class here -->
                        <a class="nav-link dropdown-toggle" href="{{ url('profile_user') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            <i class="fas fa-user" style="color: white;"></i> Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="text-center">
                                <img src="{{ asset(Auth::user()->image_profil) }}" class="rounded-circle mb-3" style="width: 100px; aspect-ratio: 1/1; object-fit: cover;" alt="Avatar">
                                <p class="card-text">{{ Auth::user()->username }} </p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div>
                                <a class="dropdown-item" href="{{ url('profile_user') }}"><i class="fa fa-user"></i> Profile</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class>
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <footer class="footer d-flex justify-content-between" style="background-color: #007BFF; color: #fff; padding: 10px;">
        <div class="container">
            <h3><i class="fas fa-phone-alt"></i> Contact Us</h3>
            <p>Address: 123 Example Street</p>
            <p>Phone: <i class="fas fa-phone"></i> (123) 456-7890</p>
            <p>Email: <i class="fas fa-envelope"></i> info@carrental.com</p>
        </div>

        <div>
            <button class="btn btn-sm btn-danger mx-3" type="button" data-bs-toggle="modal" data-bs-target="#staticLogoutUser">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </div>
    </footer>

    <!-- /Modal Dialog - Logout -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>