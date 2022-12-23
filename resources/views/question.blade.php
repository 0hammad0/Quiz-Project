@extends('layouts.frontend.body')

@section('title')
    Question
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container p-5">
            <div class="card text-center">
                <div class="card-header">
                    <a href="/">
                        <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                    {{ $ser_qu->name }} - Question 1/{{ $ser_qu->quantity }}
                </div>
                <div class="card-body">
                    <img src="{{ asset($que->file_path) }}" alt="question image" />
                    <hr />
                    <h4 id="question">{{ $que->question }}</h4>

                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $que->id }}" />
                        <input type="hidden" name="series_id" value="{{ $ser_qu->id }}" />
                        <input type="hidden" name="page_id" value="{{ $ser_qu->id }}" />

                        <div class="container" id="question_set">

                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="A"
                                        aria-label="Checkbox for following text input" id="op1" name="op1">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with checkbox"
                                    value="{{ $que->option1 }}" readonly>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="B"
                                        aria-label="Checkbox for following text input" id="op2" name="op2">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with checkbox"
                                    value="{{ $que->option2 }}" readonly>
                            </div>

                            @if ($que->option3)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox" value="C"
                                            aria-label="Checkbox for following text input" id="op3" name="op3">
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox"
                                        value="{{ $que->option3 }}" readonly>
                                </div>
                            @endif

                            @if ($que->option4)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox" value="D"
                                            aria-label="Checkbox for following text input" id="op4" name="op4">
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox"
                                        value="{{ $que->option4 }}" readonly>
                                </div>
                            @endif
                        </div>
                        <h3 id="ans_show"></h3>
                        <p id="desc" style="display: none">{{ $que->description }}</p>
                        <hr>
                        <h4 id="correct_answer" style="display: none">Correct Answer: {{ $que->answer }}</h4>
                        <h1 style="display: none" id="ans">{{ $que->answer }}</h1>
                </div>
                <div class="card-footer text-muted"
                    style="    justify-content: center;
                                display: flex;">
                    <a class="btn btn-danger" style="color: white" onclick="validate()" id="validate">Validate</a>


                    <button type="submit" class="btn btn-success" style="color: white; display: none"
                        id="continue">Continue</button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection
