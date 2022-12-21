@extends('layouts.frontend.body')

@section('title')
    Question
@endsection

@section('content')
    <form action="" method="get">
        <div class="container mt-5">
            <div class="container p-5">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="index.html">
                            <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                        Series 1 - Question 1/10
                    </div>
                    <div class="card-body">
                        <img src="asset/images/caravan.webp" alt="caravan" />
                        <hr />
                        <h4>I can transport people in a caravan:</h4>
                        <div class="container float-left">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" />
                                <label class="form-check-label" for="flexRadioDefault1">
                                    yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" />
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Nope
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/results.html" class="btn btn-danger">Validate</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
