<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{URL::asset ('asset/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{URL::asset ('asset/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{URL::asset ('asset/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image" href="{{ asset('favicon.ico') }}" />


        <!-- Template Stylesheet -->
        <link href="{{URL::asset ('asset/css/style.css') }}" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top animate__animated animate__slideInDown">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Silaen, Toba, Sumatera Utara</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">maruduttani@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#""><i class="fab fa-whatsapp me-4 text-secondary fa-2x"></i></a>
                        <a href="#"><i class="fab fa-instagram me-4 text-secondary fa-2x"></i></a>
                        <a href="#"><i class="fab fa-youtube me-4 text-secondary fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <img src="{{ URL::asset('asset/img/favicon.ico') }}" class="img-fluid w-10 h-100 d-none d-lg-block">
                    <a href="/" class="navbar-brand col-md-6"><h2 class="text-primary display-6">UD. MARUDUT TANI</h2></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ url('shop') }}" class="nav-item nav-link">Shop</a>
                            <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
                            <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <div class="nav-item dropdown position-relative" style="transform: translateY(10%)">
                                <a href="#" class="my-auto dropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user fa-2x"></i>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0 position-absolute text-center" style="transform: translate(-40%, 5%);">
                                        <a href="/admin/login" class="dropdown-item">Admin</a>
                                        <a href="/kasir/login" class="dropdown-item">Kasir</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        @yield('navhead')

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 animated__animated animate__slideInUp">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <a href="#" style="display: flex; flex-direction:row;">
                                <h1 class="text-primary mb-12">UD. Marudut Tani</h1>
                            </a>
                        </div>
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-9 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p class="col-lg-5">Jl. D.I. Panjaitan, Marsangap, Kec. Sigumpar, Toba, Sumatera Utara</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: 0821 - 6738 - 5706</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a></br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right text-md-end mb-12 mb-md-12">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>UD. Marudut Tani</a>, All right reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
        @yield('footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL::asset ('asset/lib/easing/easing.min.js') }}"></script>
    <script src="{{URL::asset ('asset/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{URL::asset ('asset/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{URL::asset ('asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{URL::asset ('asset/js/main.js') }}"></script>
    <script src="{{URL::asset ('asset/js/script.js') }}"></script>
    @stack('script')
    </body>

</html>
