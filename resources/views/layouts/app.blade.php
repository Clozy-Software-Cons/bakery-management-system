<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bakery Management System</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="shortcut icon" href="{{ asset('assets/img/png logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <style>
        .bg-gradient-dark {
            background-color: #1d1d1f;
            background-image: none
        }
    </style>
</head>

<body class="font-sans antialiased" id="page-top">
    <div id="wrapper">

        @include('layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div class="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/img/undraw_profile_1.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            </div>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
                {{ $slot ?? null }}
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // function for dynamic routing highlight sidebar
            const route = "{{ URL::current() }}";
            const location = window.location.href.split('?')[0];

            if (location == route || location == route + '/') {

                let a_tag = $('a[href="' + route + '"]');

                if (a_tag.attr('class') == 'collapse-item') {
                    a_tag.parent().parent().parent().addClass('active');
                    a_tag.parent().parent().addClass('show');
                    a_tag.addClass('active')
                } else {
                    a_tag.parent().addClass('active')
                }

            }
        })
    </script>
</body>

</html>
