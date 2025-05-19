<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Karbon Carbondiary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .logo {
            color: #006769;
            font-size: 2.25rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            white-space: pre-line;
            line-height: 0.9;
            margin-top: 6px;
        }


        .nav-link {
            color: #006769;
            font-size: 1.5rem;
        }

        .nav-link:hover {
            text-decoration: underline;
        }


        .btn-success {
            --bs-btn-color: #fff;
            --bs-btn-bg: #006769;
            --bs-btn-border-color: #006769;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #003d3e;
            --bs-btn-hover-border-color: #003d3e;
            --bs-btn-focus-shadow-rgb: 60, 153, 110;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #003d3e;
            --bs-btn-active-border-color: #003d3e;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #006769;
            --bs-btn-disabled-border-color: #006769;
            font-size: 1.3rem;
        }

        .btn-logout {
            --bs-btn-color: #006769;
            --bs-btn-bg: #00000000;
            --bs-btn-border-color: #006769;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #003d3e;
            --bs-btn-hover-border-color: #003d3e;
            --bs-btn-focus-shadow-rgb: 60, 153, 110;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #003d3e;
            --bs-btn-active-border-color: #003d3e;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #006769;
            --bs-btn-disabled-border-color: #006769;
            font-size: 1.3rem;
        }

        .signup-btn,
        .signup-link {
            color: #006769;
            font-size: 1.3rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        .logo-image {
            width: 160px;
            height: 80px;
            object-fit: cover;
        }

        @media (max-width: 991px) {

            .logo {
                font-size: 26px;
            }

            .logo-image {
            width: 140px;
            height: 70px;
            }
        }
    </style>

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-md bg-white p-3 p-md-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a href="#" class="d-flex align-items-center text-decoration-none">
                    <div class="logo-container d-flex align-items-center gap-2">
                        <h1 class="logo m-0 fw-bold">CARBON<br>DIARY</h1>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6b2492a8d12883169b2595978c95520536ea837a"
                            alt="Earth logo with leaves" class="logo-image">
                    </div>
                </a>

                <div class="toggler-container">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav d-flex align-items-center gap-md-4">
                        <li class="nav-item"><a href="#" class="nav-link fw-semibold">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link fw-semibold">About</a></li>
                        <li class="nav-item"><a href="#" class="nav-link fw-semibold">Panduan</a></li>
                        <li class="nav-item"><a href="#" class="nav-link fw-semibold">Kontak</a></li>

                        {{-- If user is logged in --}}
                        @auth
                            <li class="nav-item">
                                <span class="nav-link fw-bold">
                                    Halo! {{ Auth::user()->name }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-logout">Logout</button>
                                </form>
                            </li>
                        @endauth

                        {{-- If user is guest (not logged in) --}}
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="btn btn-success text-white px-4 py-2">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="signup-btn nav-link fw-semibold">Daftar</a>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>