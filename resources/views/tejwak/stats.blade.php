<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tejwak</title>
    <link href="/assets/tejwak/tejwak1.css" rel="stylesheet" />
    <link href="/assets/tejwak/tejwak2.css" rel="stylesheet" />
    <script src="/assets/tejwak/tejwak3.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('home')}}">Wesh {{ Auth::user()->firstname }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <button class="btn btn-success" id="logout" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Log
                    Out</button>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="{{route('tejwak.ibad')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profiles
                        </a>
                        <a class="nav-link" href="{{route('tejwak.diour')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Properties
                        </a>
                        <a class="nav-link" href="{{route('tejwak.stats')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                            Stats
                        </a>




                    </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <main>
                <div class="container-fluid px-4">
                    <div style="display: flex; align-items: center; flex-direction : column;">
                        <h1 class="m-4" style="flex: 3;">Stats</h1>

                        <div>
                            <h3>User Count: {{ $userCount }}</h3>
                            <h3>Listing Count: {{ $listingCount }}</h3>
                            <h3>Pending Users: {{$pendingUsers}}</h3>
                            <h3>Pending Listings: {{$pendingListings}}</h3>
                        </div>


                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, Chelfi Za3iiim
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/js/core/bootstrap.bundle.min.js"></script>
    <script src="/assets/tejwak/tejwak4.js"></script>




</body>

</html>