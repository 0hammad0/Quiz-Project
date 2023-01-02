@extends('layouts.frontend.home_body')

@section('title')
    PermisGO
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container mt-3">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/images/image.png') }}" class="d-block w-100" alt="image">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/images/image.png') }}" class="d-block w-100" alt="image">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/images/image.png') }}" class="d-block w-100" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row crd">
                <div class="col-md-4 mt-2">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title card-head">Code de la route</h5>
                            <p class="card-text card-mid">a partir de <br /> 20$</p>
                            <a href="#" class="btn btn-primary">Ventes Privees Code</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title card-head">Permis <br />de conduire </h5>
                            <p class="card-text card-mid">a partir de <br /> 20$</p>
                            <a href="#" class="btn btn-primary">Ventes Privees Permis</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title card-head">Perparation <br />VTC</h5>
                            <p class="card-text card-mid">a partir de <br /> 20$</p>
                            <a href="#" class="btn btn-primary">Ventes Privees Code</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
