@extends('layouts.frontend.body')

@section('title')
    Question
@endsection

@section('content')
    <form action="/record" method="POST">
        <div class="container mt-5">
            <div class="container p-5">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="/">
                            <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                        Series 1 - Question 1/10
                    </div>
                    @foreach ($dq as $dqs)
                        <div class="card-body">
                            <img src="{{ asset($dqs->image_path) }}" alt="caravan" />
                            <hr />
                            <h4>{{ $dqs->question }}</h4>
                            <div class="container float-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="A" id="A"
                                        value="A" />
                                    <label class="form-check-label" for="A">
                                        {{ $dqs->option1 }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="A" id="B"
                                        value="B" />
                                    <label class="form-check-label" for="B">
                                        {{ $dqs->option2 }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <a type="button" class="btn btn-danger">Validate</a>
                        </div>
                </div>
                @endforeach
                @if ($dq->hasMorePages())
                    <a href="{{ $dq->nextPageUrl() }}">Next</a>
                @else
                @endif
            </div>
        </div>
    </form>
@endsection
