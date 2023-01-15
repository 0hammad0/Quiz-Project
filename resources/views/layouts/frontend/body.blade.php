<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/images/logo.png') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen" />
    <script src="https://kit.fontawesome.com/cfa23f9428.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(216, 231, 255)">

    @yield('content')

    {{-- <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugin.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.j') }}s"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/js/owl.carousel.js') }}"></script>     --}}
    {{-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script> --}}

    <script>
        function validate() {
            var a = document.getElementById("question_set");
            var b = document.getElementById("validate");
            var c = document.getElementById("continue");
            var d = document.getElementById("desc");
            var e = document.getElementById("question");
            var f = document.getElementById("correct_answer");
            var g = document.getElementById("hr");

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

            if (document.getElementById('op5')) {
                var ca5 = document.getElementById('op5');

                if (ca5.checked == true) {
                    var c5 = ca5.value;
                }
            }

            if (ca1.checked == true || ca2.checked == true || ca3.checked == true || ca4.checked == true || ca5.checked ==
                true) {

                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "block";
                d.style.display = "block";
                e.style.display = "none";
                f.style.display = "block";
                g.style.display = "block";

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

                if (c5 == undefined)
                    c5 = "";

                var result = "";
                result = c1 + c2 +
                    c3 + c4 + c5;


                var ans = document.getElementById("ans");
                var ans_show = document.getElementById("ans_show");

                if (result == ans.textContent)
                    ans_show.innerHTML = "Your answer is True";
                else {
                    if (result == "E")
                        ans_show.innerHTML = "Time's out";
                    else
                        ans_show.innerHTML = "Your answer is false";
                }

                var im = document.getElementById('img');
                var vd = document.getElementById('vid');
                var ans_vd = document.getElementById('ans_video');

                ans_vd.style.display = "block";
                im.style.display = "none";
                vd.style.display = "none";
            }
        }

        function audio_play() {
            var play = document.getElementById("play");
            var pause = document.getElementById("pause");
            var audio = document.getElementById("audio");

            play.style.display = "none";
            pause.style.display = "block";
            audio.play();
        }

        function audio_pause() {
            var play = document.getElementById("play");
            var pause = document.getElementById("pause");
            var audio = document.getElementById("audio");

            play.style.display = "block";
            pause.style.display = "none";
            audio.pause();
            audio.currentTime = 0;
        }

        function op1() {
            var op1 = document.getElementById('op1l');
            var op1ch = document.getElementById('op1');
            var div_op1 = document.getElementById('div_op1');
            // console.log(op1ch.checked);

            if (op1ch.checked == true) {
                op1.style.borderColor = "rgb(57 197 89)";
                op1.style.boxShadow = "0px 0px 4px 0px rgb(57 197 89)";
                div_op1.style.backgroundColor = "rgb(57 197 89)";
                div_op1.style.color = "white";
            } else {
                op1.style.borderColor = "#CED4DA";
                op1.style.boxShadow = "0px 0px 0px 0px #e7c17c";
                div_op1.style.backgroundColor = "rgb(233,236,239)";
                div_op1.style.color = "rgb(166,114,87)";
            }
        }

        function op2() {
            var op2 = document.getElementById('op2l');
            var op2ch = document.getElementById('op2');
            var div_op1 = document.getElementById('div_op2');
            // console.log(op1ch.checked);

            if (op2ch.checked == true) {
                op2.style.borderColor = "rgb(57 197 89)";
                op2.style.boxShadow = "0px 0px 4px 0px rgb(57 197 89)";
                div_op2.style.backgroundColor = "rgb(57 197 89)";
                div_op2.style.color = "white";
            } else {
                op2.style.borderColor = "#CED4DA";
                op2.style.boxShadow = "0px 0px 0px 0px #e7c17c";
                div_op2.style.backgroundColor = "rgb(233,236,239)";
                div_op2.style.color = "rgb(166,114,87)";
            }
        }

        function op3() {
            var op3 = document.getElementById('op3l');
            var op3ch = document.getElementById('op3');
            var div_op1 = document.getElementById('div_op3');
            // console.log(op1ch.checked);

            if (op3ch.checked == true) {
                op3.style.borderColor = "rgb(57 197 89)";
                op3.style.boxShadow = "0px 0px 4px 0px rgb(57 197 89)";
                div_op3.style.backgroundColor = "rgb(57 197 89)";
                div_op3.style.color = "white";
            } else {
                op3.style.borderColor = "#CED4DA";
                op3.style.boxShadow = "0px 0px 0px 0px #e7c17c";
                div_op3.style.backgroundColor = "rgb(233,236,239)";
                div_op3.style.color = "rgb(166,114,87)";
            }
        }

        function op4() {
            var op4 = document.getElementById('op4l');
            var op4ch = document.getElementById('op4');
            var div_op1 = document.getElementById('div_op4');
            // console.log(op1ch.checked);

            if (op4ch.checked == true) {
                op4.style.borderColor = "rgb(57 197 89)";
                op4.style.boxShadow = "0px 0px 4px 0px rgb(57 197 89)";
                div_op4.style.backgroundColor = "rgb(57 197 89)";
                div_op4.style.color = "white";
            } else {
                op4.style.borderColor = "#CED4DA";
                op4.style.boxShadow = "0px 0px 0px 0px #e7c17c";
                div_op4.style.backgroundColor = "rgb(233,236,239)";
                div_op4.style.color = "rgb(166,114,87)";
            }
        }
    </script>
    @yield('script')
</body>

</html>
