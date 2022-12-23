<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- owl carousel style -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}" />
    <!-- fevicon -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen" />
    <script src="https://kit.fontawesome.com/cfa23f9428.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(216, 231, 255)">
    <!--header section start -->
    <div class="header_bg"
        style="
                box-shadow: 1px 0px 15px 0px black;
                background-color: rgb(253, 255, 252);
            ">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="/" class="logo" style="font-size: 25px">Take a Quiz</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/index">Traffic Laws</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Driver's license</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Assistance</a>
                        </li>
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
                                <a id="navbar" class="nav-link" href="#" role="button" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    @yield('content')

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <script>
        function validate() {
            var a = document.getElementById("question_set");
            var b = document.getElementById("validate");
            var c = document.getElementById("continue");
            var d = document.getElementById("desc");
            var e = document.getElementById("question");
            var f = document.getElementById("correct_answer");

            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "block";
            d.style.display = "block";
            e.style.display = "none";
            f.style.display = "block";

            var ca1 = document.getElementById("op1");
            var ca2 = document.getElementById("op2");

            if (document.getElementById("op3")) {
                var ca3 = document.getElementById("op3");

                if (ca3.checked == true) {
                    var c3 = ca3.value;
                }
            }

            if (document.getElementById("op4")) {
                var ca4 = document.getElementById("op4");

                if (ca4.checked == true) {
                    var c4 = ca4.value;
                }
            }

            if (ca1.checked == true)
                var c1 = ca1.value;

            if (ca2.checked == true)
                var c2 = ca2.value;

            if (c1 == undefined)
                c1 = "";

            if (c2 == undefined)
                c2 = "";

            if (c3 == undefined)
                c3 = "";

            if (c4 == undefined)
                c4 = "";

            var result = "";
            result = c1 + c2 +
                c3 + c4;


            var ans = document.getElementById("ans");
            var ans_show = document.getElementById("ans_show");

            if (result == ans.textContent)
                ans_show.innerHTML = "Your answer is True";
            else
                ans_show.innerHTML = "Your answer is false";
        }
    </script>
</body>

</html>
