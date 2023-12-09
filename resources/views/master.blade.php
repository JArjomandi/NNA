<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>NetArchiPedia - Neural Network Architectures Database</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/ico.png') }}" rel="icon">
    <link href="{{ asset('assets/img/ico.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- =======================================================
    * Template Name: OnePage
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        .g-recaptcha-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        {{--
                <h1 class="logo"><a href="{{ route('home') }}">NetArchiPedia - Neural Network Architectures Database</a></h1>
        --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/img/ico.png') }}" alt="" class="img-fluid">
        </a>
        <h1 class="logo">
            <a href="{{ route('home') }}">NetArchiPedia - Neural Network Architectures Database</a>
        </h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto " href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ route('newsletter') }}"><b>Newsletter</b></a>
                </li>
                <li>
                    <a href="{{ route('register-form') }}"><button class=" btn btn-sm btn-primary">Register New Network</button></a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
    <div class="modal" id="sub">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</header><!-- End Header -->



<main id="main">

    @yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>NetArchiPedia</h3>
                    <p>
                        Department Artificial Intelligence in Biomedical Engineering
                        <br>
                        Werner-von-Siemens-Str. 61
                        <br>
                        91052 Erlangen
                        <br>
                        Germany
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="https://img.shields.io/badge/netarchipedia-registered-orange">Your registered your network? Get Netarchipedia badge for your github now!!:</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong>
                    <span>NetArchiPedia</span>
                </strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter">
                <i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook">
                <i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram">
                <i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus">
                <i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin">
                <i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>
