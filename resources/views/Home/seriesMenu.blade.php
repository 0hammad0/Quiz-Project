@extends('layouts.frontend.Home_body')

@section('title')
    Section Menu
@endsection

@section('content')
    <div class="container">
        <br />
        <div class="container text-center">
            <h2>Entertainments au code</h2>

            <div class="row row-cols-2" style="margin-bottom: 24px;">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('series-id-redirect', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/quiz.png') }}" class="sec_img" class="sec_img" alt="quiz"
                                style="height: 4vh;">
                            Series Simples
                            <i class="fas fa-chevron-right float-end text-danger section-i-1" style=""></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('series-id-redirect-examens', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/exam.png') }}" class="sec_img" alt="quiz"
                                style="height: 4vh;">
                            Examens blancs
                            <i class="fas fa-chevron-right float-end text-danger section-i-2"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('/statistiques', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/stats.png') }}" class="sec_img" alt="quiz"
                                style="height: 3vh;">
                            Statistiques
                            <i class="fas fa-chevron-right float-end text-danger section-i-3"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ route('mistakes.show', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/mistakes.png') }}" class="sec_img" alt="quiz"
                                style="height: 4vh;">
                            Mes erreurs
                            @if ($mistakes == 0)
                                <i class="fas fa-chevron-right float-end text-danger section-i-4"></i>
                            @else
                                <span class="mistakes">{{ $mistakes }}</span>
                            @endif
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h2 class="">Revisitions mes cours</h2>
            <div class="row row-cols-2" style="margin-bottom: 24px;">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('/articles', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/articles.png') }}" class="sec_img" alt="quiz"
                                style="height: 4vh;">
                            Articles
                            <i class="fas fa-chevron-right float-end text-danger section-i-5"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href={{ url('/learning-Video', $seriesTypeID->id) }}>
                        <button type="button" class="series-btn q-btn">
                            <img src="{{ asset('new_asset/img/learning.png') }}" class="sec_img" alt="quiz"
                                style="height: 4vh;">
                            Learning
                            <i class="fas fa-chevron-right float-end text-danger section-i-6"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white px-sm-3 px-lg-5" style="margin-top: 9.8rem">
        <div class="row pt-5">
            <div class="col-md-2"></div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px">
                            Get In Touch
                        </h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Mars</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>demo@example.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px">
                            Pages
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Code
                                de la route</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Permis de
                                conduire</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Perparation
                                VTC</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Perparation
                                TEXI</a>
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
@endsection
