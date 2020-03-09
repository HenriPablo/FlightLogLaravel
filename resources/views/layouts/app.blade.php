<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FlightLog</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <script src="https://kit.fontawesome.com/8d7e287c54.js" crossorigin="anonymous"></script>--}}


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- START CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/flight_log.css') }}">
    <!-- END START CUSTOM CSS -->

    @yield('css')

<!-- jQuery 3.2.1 -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"--}}
{{--            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>--}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="{!! asset('smart-menus/jquery.smartmenus.min.js') !!}"></script>
    <script src="{!! asset('smart-menus/sm-bootstrap-4/jquery.smartmenus.bootstrap-4.min.js') !!}"></script>
    <link href="{!! asset('smart-menus/sm-bootstrap-4/jquery.smartmenus.bootstrap-4.css') !!}"/>
    <link href="{!! asset('smart-menus/sm-core-css.css') !!}"/>
    <link href="{!! asset('smart-menus/sm-mint/sm-mint.css') !!}"/>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    @yield('scripts')
</head>

<body class="skin-blue sidebar-mini">

@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">



            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-4">
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand minor-logo-link" href="{!! url('/home') !!}">
            <img src="{{ asset('art/flight-log-icon-v3-org-blu.svg') }}" class="minor-logo">
        </a>

        <!-- MAIN NAV -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul id="navbarNavDropdown" class="nav navbar-nav mr-auto main-nav">
                <li><a href="{!! url('/flight') !!}">Flight</a></li>
                <li><a href="{!! url('/aircraft') !!}">Airfcraft</a></li>
                <li><a href="{!! url('/airport') !!}">Airport</a></li>
                <li><a href="{!! url('/crewmember') !!}">Crewmember</a></li>
                <li><a href="{!! url('/crewmember_type') !!}">Crewmember Type</a></li>
                <li><a href="{!! url('/preferences')!!}">Preferences</a></li>
                <!-- Authentication Links -->
                <li><a href="{!! url('/login') !!}">Login</a></li>
                <li><a href="{!! url('/logout') !!}">Logout</a></li>
                <li><a href="{!! url('/register') !!}">Register</a></li>
            </ul>
        </div>
    </nav>
<script>
    // $(document).ready( function () {
    //     $("#main-nav").smartmenus();
    // });
</script>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif
</body>
</html>
