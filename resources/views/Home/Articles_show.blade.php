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
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="container">
                <h2>{{ $articleType->articleType }}</h2>
                @foreach ($articleContent as $artcon)
                    <div class="card mt-3" style="padding: 20px; border-radius: 10px; box-shadow: 0px 0px 3px 0px #8686ff;">
                        <h3>{{ $artcon->heading }}</h3>
                        <br />
                        <img src="{{ asset($artcon->image_path) }}" alt="Article Image">
                        <br />
                        <p>{{ $artcon->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3"></div>
    </div>
@endsection
