<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers') }}">Teachers</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                @endif
            </ul>
            <div class="d-flex">
                @if (Auth::check())
                    <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger">LogOut</a>
                @else
                    <a href="{{ route('signUp') }}" class="btn btn-outline-primary me-1">Sign Up</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-success">Sign In</a>
                @endif
            </div>
        </div>
    </div>
</nav>