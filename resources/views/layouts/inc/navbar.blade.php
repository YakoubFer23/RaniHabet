<div class="container-fluid nav-bar bg-transparent" id="navyy">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ asset('img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">RaniHabet</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{route('listings.add')}}" class="nav-item nav-link">Add a Property</a>
                        <a href="{{route('user.show',Auth::user()->id)}}" class="nav-item nav-link">Profile</a>
                    </div>
                    @if(Auth::check())
    <!-- User is authenticated, display user-specific content here -->
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome {{Auth::user()->firstname}}</a>
        <div class="dropdown-menu rounded-0 m-0">
            <a href="{{route('dash.index')}}" class="dropdown-item">Dashboard</a>
            <!-- Logout Form -->
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@else
    <!-- User is not authenticated, show the Login/Register button -->
    <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">Login/Register</a>
@endif
                    
                </div>
            </nav>
        </div>