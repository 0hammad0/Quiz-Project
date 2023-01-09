@extends('layouts.frontend.home_body')

@section('title')
    PermisGO
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container mt-3">
            <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner" style="border-radius: 20px; box-shadow: 0px 0px 10px 0px #8282fb;">
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/images/1672380388_Faisal_Masjid.jpg') }}" class="d-block w-100"
                            alt="..." style="height: 400px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/images/image.png') }}" class="d-block w-100" alt=""
                            style="height: 400px">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev" hidden>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next" hidden>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row crd">
                <div class="col-md-4 mt-2 text-center">
                    <div class="card" style="border-radius: 20px; box-shadow: 0px 0px 7px 0px #8282fb;">
                        <div class="container mt-2">
                            <h1>Code de la route</h1>
                            <hr />
                            <p class="price">$20</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur voluptates aut vel
                                sapiente</p>
                            <p><a href="/pricing"><button class="btn btn-behance">Ventes Privees Code</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2 text-center">
                    <div class="card" style="border-radius: 20px; box-shadow: 0px 0px 7px 0px #8282fb;">
                        <div class="container mt-2">
                            <h1>Permis de conduire </h1>
                            <hr />
                            <p class="price">$20</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur voluptates aut vel
                                sapiente</p>
                            <p><a href="/pricing"><button class="btn btn-behance">Ventes Privees Permis</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2 text-center">
                    <div class="card" style="border-radius: 20px; box-shadow: 0px 0px 7px 0px #8282fb;">
                        <div class="container mt-2">
                            <h1>Perparation VTC</h1>
                            <hr />
                            <p class="price">$20</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur voluptates aut vel
                                sapiente</p>
                            <p><a href="/pricing"><button class="btn btn-behance">Ventes Privees Code</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
