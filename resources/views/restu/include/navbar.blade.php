<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{url('/')}}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{url('/about')}}" class="nav-item nav-link">About</a>
                        <a href="{{url('/services')}}" class="nav-item nav-link">Service</a>
                        <a href="{{url('/menu')}}" class="nav-item nav-link">Menu</a>
                        <a href="{{url('/cart')}}" class="nav-item nav-link">Cart</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User Info</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{url('/login_user')}}" class="dropdown-item">Login</a>
                                <a href="{{url('/register_user')}}" class="dropdown-item">Register</a>
                                <a href="{{url('/logout_user')}}" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                        <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{url('/booking')}}" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>
        <!-- Navbar & Hero End -->
