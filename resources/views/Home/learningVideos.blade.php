@extends('layouts.frontend.body')

@section('title')
    Articles
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>
';" aria-label="breadcrumb" class="sticky-top">
        <ol class="breadcrumb" style="height: 7vh; background-color: white;">
            <h4 class="mt-3 mx-5">
                <a href="{{ url()->previous() }}">
                    < Back</a>
            </h4>
        </ol>
    </nav>
    <div class="container text-center">
        <h2>Videos</h2>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        @foreach ($videos as $video)
            <div class="col-md-2">
                <div class="container">
                    <iframe width="300" height="200" src="{{ $video->videoLink }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
        <div class="col-md-2"></div>
    </div>
@endsection
