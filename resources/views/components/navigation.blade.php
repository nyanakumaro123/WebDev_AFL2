<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">HoopsCloth</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Centered navigation links -->
            <div class="navbar-nav mx-auto">
                <a class="nav-link" href="{{ url('/') }}#about">About</a>
                <a class="nav-link" href="{{ url('/') }}#products">Products</a>
                <a class="nav-link" href="{{ url('/') }}#gallery">Gallery</a>
                <a class="nav-link" href="{{ url('/') }}#contact">Contact</a>
            </div>

            <!-- Auth links on the right -->
            <div class="navbar-nav">
                @auth
                    <!-- Simple logout button -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-light p-0" style="border: none; background: none;">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- Show login/register when not authenticated -->
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>