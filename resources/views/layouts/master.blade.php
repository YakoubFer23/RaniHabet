<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rani Habet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @if (!isset($includeCarousel) || $includeCarousel)
        <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Banner Start -->
        @if (Auth::check())
            @if (Auth::user()->identity_verified == 'unverified')
                <div class="banner wow fadeInDown" data-wow-delay="0.1s" id="banner">
                    To be able to list and apply for rooms, please&nbsp;<a href="{{route('verify-identity')}}">click
                        here</a>&nbsp;to verify your identity.
                    <span class="close-btn" id="close-btn">&times;</span>
                </div>

            @elseif (Auth::user()->identity_verified == 'failed')
                <div class="banner" id="banner">
                    We couldn't verify your identity. Please &nbsp;<a href="{{route('verify-identity')}}">click here</a>&nbsp;to
                    resubmit your identity verification.
                    <span class="close-btn" id="close-btn">&times;</span>
                </div>
            @endif
        @endif
        @if (session('pending'))
            
                <div class="banner" id="banner">
                    Your identity verification is pending approval. Please check your profile periodically
                    <span class="close-btn" id="close-btn">&times;</span>
                </div>
        @endif
        <!-- Banner End -->

        <!-- Navbar Start -->
        @include('layouts.inc.navbar')
        <!-- Navbar End -->

        <!-- Header Start -->

        <!-- Header End -->


        @yield('content')

        <!-- Footer Start -->
        @include('layouts.inc.footer')
        <!-- Footer End -->


        <!-- Back to Top -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>