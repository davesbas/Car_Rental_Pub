<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="antialiased">

    <style>

        .card {
            background-color: transparent;
            animation: fadeInUp 1s ease-in-out;
            z-index: 999;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form {
            animation: fadeIn 1s ease-in-out;
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(50%);
        }

        body {
            font-family: Roboto, Helvetica, Arial, sans-serif;
           
        }

        section {
            width: 100%;
            min-height: 100vh;
        }

        h1{
            font-weight: bold;
            color: white;
        }

        p{
            color:white;
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }


        .btn-register-here {
            color: blue;
            text-decoration: underline;
            border: none;
            background: none;
            font-size: 16px;
        }

        .custom-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
            margin-left: auto;
        }

        .custom-link:hover {
            color: darkblue;
            text-decoration: underline;
        }
    </style>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5 form">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10 ">
                <video autoplay muted loop id="video-bg">
                    <source src="/video/vidLogin.mp4" type="video/mp4">
                </video>
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Executive Rental<br />
                    <span style="color: hsl(218, 81%, 75%)">Yang Mampu-Mampu Saja</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%); text-align: justify;">
                    Selamat datang di layanan rental mobil kami yang dapat diandalkan dan terpercaya!
                    Kami menawarkan kenyamanan dan kebebasan bagi pelanggan kami untuk menjelajahi tempat-tempat
                    menarik di sekitar kota dengan kendaraan yang terawat dengan baik dan terjamin kehandalannya.
                </p>
                <p class="mb-4 opacity-70 justify-content-center" style="color: hsl(218, 81%, 85%); text-align: justify">
                    Kami memiliki beragam armada kendaraan mulai dari mobil keluarga yang luas, kendaraan mewah,
                    hingga mobil ekonomis yang ramah lingkungan. Kendaraan kami dirawat secara teratur oleh teknisi
                    berpengalaman untuk memastikan keamanan dan kenyamanan setiap perjalanan. Dengan pilihan kendaraan
                    yang beragam, pelanggan kami dapat menemukan mobil yang sesuai dengan kebutuhan dan anggaran mereka.
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div i d="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div i d="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card animated">
                    <div class="card-body px-4 py-5 px-md-5 form animated">
                        <div>
                            <h1 class="mb-3 text-center">Register</h1>
                        </div>

                        <hr>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif

                        <form class="form" action="{{ route('actionRegister') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-2">
                                <input type="file" name="image_profil" class="form-control" id="profile_picture" accept="image/*">
                                <label for="profile_picture">Profile Picture</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Nama Pegawai" required />
                                <label for="floatingInput">Username</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required />
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Email" required />
                                <label for="floatingEmail">Email</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" name="num_phone" pattern="\d+" class="form-control" id="floatingTelep" placeholder="NoTelep" required />
                                <label for="floatingTelep">Num Phone</label>
                            </div>


                            <div class="form-floating mb-2">
                                <input type="text" name="nik" pattern="\d+" class="form-control" id="floatingNIK" placeholder="NIK" required />
                                <label for="floatingNIK">NIK</label>
                            </div>


                            <div class="form-floating mb-2">
                                <input type="date" name="born_date" class="form-control" id="floatingTanggalLahir" placeholder="TanggalLahir" required />
                                <label for="floatingTanggalLahir">Born-Date</label>
                            </div>

                            <button type="submit" style="width: 100%;" class="btn btn-primary btn-block mb-2 mt-3">
                                Register
                            </button>
                        </form>
                        <p class="text-center">
                            Sudah punya akun? <a style="color: lightblue;" href="{{route('login')}}">Login disini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>