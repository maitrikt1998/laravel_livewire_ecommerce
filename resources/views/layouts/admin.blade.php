<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Page' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hide toggle button on larger screens */
        @media (min-width: 768px) {
            .navbar-toggler {
                display: none;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-success border-bottom-0">
        <!-- Navbar toggle button (hamburger icon) -->
        <button class="navbar-toggler d-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="offcanvas offcanvas-start bg-success d-md-block" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-light" id="sidebarLabel">Admin Home Page</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="#">
                        Overview
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('admin.categories')}}">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('admin.products')}}">
                        Products
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky bg-success vh-100">
                    <div class="pt-3">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span class="text-light">
                                Admin sidebar
                            </span>
                        </h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active text-light" href="#">
                                    Overview
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('admin.categories')}}">
                                    Categories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('admin.products')}}">
                                    Products
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
