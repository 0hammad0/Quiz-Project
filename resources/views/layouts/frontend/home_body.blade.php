<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('new_asset/img/PermisGo-Logo.jpeg') }}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" /> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('new_asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('new_asset/css/custom-style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-9 text-right">
                <div class="container-fluid">
                    <div class="row border-top">
                        <div class="col-md-9"></div>
                        <div class="col-lg-3 mt-2">
                            <ul
                                style="
                    display: flex;
                    justify-content: space-around;
                    text-decoration: none;
                    list-style-type: none;
                  ">
                                <li>
                                    <a href=""><i class="fab fa-facebook"
                                            style="color: rgb(89, 89, 255)"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-youtube" style="color: red"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-twitter" style="color: rgb(77, 77, 255)"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <h1 class="m-0 mt-2 h-title-d">
                        Permis<span class="text-primary">Go</span>
                    </h1>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ url('/') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0">Permis<span class="text-primary">Go</span></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"
                        style="border: 0px">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="{{ url('/') }}"
                                class="nav-item nav-link nav-link-bold {{ Request::is('/') ? 'active' : '' }}">Accueil</a>

                            <a href="{{ url('code-de-la-route', $seriesType[0]->id) }}"
                                class="nav-item nav-link {{ Request::is('code-de-la-route/1') ? 'active' : '' }} {{ Request::is('series-id-redirect/1') ? 'active' : '' }}">Code
                                de la Route</a>

                            <a href="{{ url('permis-de-Conduir-B', $seriesType[1]->id) }}"
                                class="nav-item nav-link {{ Request::is('permis-de-Conduir-B/2') ? 'active' : '' }} {{ Request::is('series-id-redirect/2') ? 'active' : '' }}">Permis
                                de Conduir B</a>

                            <a href="{{ url('formation-VTC', $seriesType[2]->id) }}"
                                class="nav-item nav-link {{ Request::is('formation-VTC/3') ? 'active' : '' }} {{ Request::is('series-id-redirect/3') ? 'active' : '' }}">Formation
                                VTC</a>

                            <a href="{{ url('formation-TAXI', $seriesType[3]->id) }}"
                                class="nav-item nav-link {{ Request::is('formation-TAXI/4') ? 'active' : '' }} {{ Request::is('series-id-redirect/4') ? 'active' : '' }}">Formation
                                TAXI</a>

                            <a href="{{ url('/create') }}"
                                class="nav-item nav-link {{ Request::is('create') ? 'active' : '' }}">Contact us</a>

                            @guest
                                <li class="nav-item ml-4">
                                    @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                </li>
                            @else
                                <li class="nav-item">
                                    <a id="navbar" class="nav-link" href="{{ url('/userDetail', Auth::id()) }}"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                </li>
                                <li>
                                    <div class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    @yield('content')





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top mb-5"><i
            class="fa fa-angle-double-up"></i></a>


    <footer class="footer fixed-bottom mobile-footer" style="max-height: 63px; padding-top: 5px">
        <div class="container my-1">
            <ul
                style="
            display: flex;
            justify-content: space-around;
            text-decoration: none;
            list-style-type: none;
            font-size: 25px;
            padding-right: 22px
          ">
                <li class="text-center bottom-menu-li">
                    <a href="{{ url('/') }}"><i class="fas fa-home bottom-menu-icon">
                            <br />
                            <span class="bottom-menu">Home</span></i></a>
                </li>
                <li class="text-center bottom-menu-li">
                    <a href="{{ url('code-de-la-route', $seriesType[0]->id) }}"><i
                            class="fas fa-traffic-light bottom-menu-icon">
                            <br />
                            <span class="bottom-menu">Code dela route</span></i></a>
                </li>
                <li class="text-center bottom-menu-li">
                    <a href="{{ url('permis-de-Conduir-B', $seriesType[1]->id) }}"><i
                            class="fas fa-id-badge bottom-menu-icon">
                            <br />
                            <span class="bottom-menu">Permis de conduir</span></i></a>
                </li>
                <li class="text-center bottom-menu-li">
                    <a href="{{ url('formation-VTC', $seriesType[2]->id) }}"><i
                            class="fas fa-chalkboard-teacher bottom-menu-icon">
                            <br />
                            <span class="bottom-menu">Formation VTC</span></i></a>
                </li>
                <li class="text-center bottom-menu-li">
                    <a href="{{ url('formation-TAXI', $seriesType[3]->id) }}"><i
                            class="fas fa-taxi bottom-menu-icon">
                            <br />
                            <span class="bottom-menu">Formation Taxi</span></i></a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('new_asset/lib/easing/easing.min.js') }}"></script>
    <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->

    <!-- Template Javascript -->
    <script src="{{ asset('new_asset/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
