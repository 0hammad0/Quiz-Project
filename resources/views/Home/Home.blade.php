@extends('layouts.frontend.home_body')

@section('title')
    PermisGO
@endsection

@section('content')
    <div class="bg-img">
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mt-3">
            <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                    <div class="carousel-item active">
                        <img class="position-relative w-100" src="{{ asset('new_asset/img/1.jpg') }}"
                            style="max-height: 700px; object-fit: cover; width: 100%" />
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="p-5" style="width: 100%; max-width: 900px">
                                <h5 class="text-white text-uppercase mb-md-3">
                                    Best Online Quizes
                                </h5>
                                <h1 class="display-3 text-white mb-md-4">
                                    Best Education From Your Home
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="position-relative w-100" src="{{ asset('new_asset/img/2.jpg') }}"
                            style="max-height: 700px; object-fit: cover; width: 100%" />
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="p-5" style="width: 100%; max-width: 900px">
                                <h5 class="text-white text-uppercase mb-md-3">
                                    Best Online Courses
                                </h5>
                                <h1 class="display-3 text-white mb-md-4">
                                    Best Online Learning Platform
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="position-relative w-100" src="{{ asset('new_asset/img/3.jpg') }}"
                            style="max-height: 700px; object-fit: cover; width: 100%" />
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="p-5" style="width: 100%; max-width: 900px">
                                <h5 class="text-white text-uppercase mb-md-3">
                                    Best Online Courses
                                </h5>
                                <h1 class="display-3 text-white mb-md-4">
                                    New Way To Learn From Home
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- About Start -->
        <div class="container-fluid py-2">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('new_asset/img/2.jpg') }}"
                            alt="" />
                    </div>
                    <div class="col-lg-7">
                        <div class="text-left mb-4">
                            <h1>Are You Ready?</h1>
                        </div>
                        <p>
                            Since 1986, throughout the area, School of Driving has earned a
                            reputation for responsible and caring driving instruction.
                            Throughout USA, Europe and others, wherever you live, with our
                            professional and friendly local driving instructors, you’ll
                            enjoy a relaxed, positive and encouraging environment as you
                            start your driving lessons and learn to drive.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Category Start -->
        <div class="container-fluid py-2">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px">
                        Categories
                    </h5>
                    <h1>Learn and take quiz</h1>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/1.jpg') }}"
                                style="height: 180px; width: 100%" />
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">
                                    Code de la route
                                </h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/2.jpg') }}"
                                style="height: 180px; width: 100%" />
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">
                                    Permis de Conduir B
                                </h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/3.jpg') }}"
                                style="height: 180px; width: 100%" />
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Formation VTC</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/4.jpg') }}"
                                style="height: 180px; width: 100%" />
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Formation TAXI</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Start -->

        <!-- Courses Start -->
        <div class="container-fluid py-2">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px">
                        Packages
                    </h5>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/1.jpg') }}"
                                style="height: 250px; width: 100%" />
                            <div class="bg-secondary p-4 text-center">
                                <a class="h5" href="">Code de la route</a>
                                <hr />
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Minus porro natus obcaecati similique corporis nam accusamus
                                </p>
                                <div class="border-top mt-4 pt-4">
                                    <div class="text-center">
                                        <a class="m-0" href="">Buy now $20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/2.jpg') }}"
                                style="height: 250px; width: 100%" />
                            <div class="bg-secondary p-4 text-center">
                                <a class="h5" href="">Permis de conduire</a>
                                <hr />
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Minus porro natus obcaecati similique corporis nam accusamus
                                </p>
                                <div class="border-top mt-4 pt-4">
                                    <div class="text-center">
                                        <a class="m-0" href="">Buy now $20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ asset('new_asset/img/3.jpg') }}"
                                style="height: 250px; width: 100%" />
                            <div class="bg-secondary p-4 text-center">
                                <a class="h5" href="">Perparation VTC</a>
                                <hr />
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Minus porro natus obcaecati similique corporis nam accusamus
                                </p>
                                <div class="border-top mt-4 pt-4">
                                    <div class="text-center">
                                        <a class="m-0" href="">Buy now $20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white px-sm-3 px-lg-5">
            <div class="row pt-5">
                <div class="col-md-2"></div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-5 btn-md-center">
                            <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px">
                                Get In Touch
                            </h5>
                            <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Mars</p>
                            <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                            <p><i class="fa fa-envelope mr-2"></i>demo@example.com</p>
                            <div class="d-flex mt-4">
                                <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-square" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5 btn-md-center">
                            <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px">
                                Pages
                            </h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Code
                                    de la route</a>
                                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Permis de
                                    conduire</a>
                                <a class="text-white mb-2" href="#"><i
                                        class="fa fa-angle-right mr-2"></i>Perparation VTC</a>
                                <a class="text-white mb-2" href="#"><i
                                        class="fa fa-angle-right mr-2"></i>Perparation TEXI</a>
                                <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-5 text-center">
                    <h1 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px">
                        <span style="color: white">Permis</span>Go
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Recusandae pariatur optio sequi et, inventore quas ex id, enim
                        officiis illum sed obcaecati ipsam quae, beatae consequatur at
                        placeat! In, exercitationem!
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
            style="border-color: rgba(256, 256, 256, 0.1) !important">
            <div class="row">
                <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0 text-white text-center">
                        &copy; <a href="#">PermisGo</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
@endsection
