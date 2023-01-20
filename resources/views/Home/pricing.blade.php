@extends('layouts.frontend.home_body_old')

@section('title')
    Pricing
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm" style="border-radius: 20px;">
                    {{-- <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div> --}}
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">20$</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, provident quisquam
                                dolorum vel omnis</p>
                            {{-- <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li> --}}
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary" style="border-radius: 25px;">buy</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm" style="border-radius: 20px;">
                    {{-- <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div> --}}
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">20$</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, provident quisquam
                                dolorum vel omnis</p>
                            {{-- <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li> --}}
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            style="border-radius: 25px;">buy</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm" style="border-radius: 20px;">
                    {{-- <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div> --}}
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">20$</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, provident quisquam
                                dolorum vel omnis</p>
                            {{-- <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li> --}}
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            style="border-radius: 25px;">buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
