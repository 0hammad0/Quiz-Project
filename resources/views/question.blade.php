@extends('layouts.frontend.body')

@section('title')
    Question
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container p-5">
            <div class="card text-center">
                <div class="card-header ques-header">
                    <a href="/">
                        <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                    {{ $ser_qu->name }} - Question {{ $ques_count }} of {{ $total_ques }}
                    @if ($que->audio_path != null)
                        <i class="fas fa-play float-right" style="cursor: pointer" onclick="audio_play()" id="play"></i>
                        <i class="fas fa-pause float-right" style="cursor: pointer; display: none;" onclick="audio_pause()"
                            id="pause"></i>
                        <audio src="{{ asset($que->audio_path) }}" class="float-right" id="audio"></audio>
                    @endif
                </div>
                <div class="card-body">
                    @if ($que->file_path != null)
                        <img src="{{ asset($que->file_path) }}" alt="question image" />
                    @endif
                    @if ($que->video_path != null)
                        <video src="{{ asset($que->video_path) }}" style="width: 100%" type="video/mp4" controls></video>
                    @endif
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
                                    <input type="checkbox" value="A"
                                        aria-label="Checkbox for following text input"id="op1" name="op1" />
                                </div>
                                <label for="op1" class="form-control ques-option"
                                    aria-label="Text input with checkbox">{{ $que->option1 }}</label>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input type="checkbox" value="B"
                                        aria-label="Checkbox for following text input"id="op2" name="op2" />
                                </div>
                                <label for="op2" class="form-control ques-option"
                                    aria-label="Text input with checkbox">{{ $que->option2 }}</label>
                            </div>

                            @if ($que->option3)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input type="checkbox" value="C"
                                            aria-label="Checkbox for following text input"id="op3" name="op3" />
                                    </div>
                                    <label for="op3" class="form-control ques-option"
                                        aria-label="Text input with checkbox">{{ $que->option3 }}</label>
                                </div>
                            @endif

                            @if ($que->option4)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input type="checkbox" value="D"
                                            aria-label="Checkbox for following text input"id="op4" name="op4" />
                                    </div>
                                    <label for="op4" class="form-control ques-option"
                                        aria-label="Text input with checkbox">{{ $que->option4 }}</label>
                                </div>
                            @endif
                        </div>
                        <h3 id="ans_show"></h3>
                        <p id="desc" style="display: none">{{ $que->description }}</p>
                        <hr id="hr" style="display: none">
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
