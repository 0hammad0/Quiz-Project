@extends('layouts.frontend.body')

@section('title')
    Question
@endsection

@section('content')
    <div class="container">
        <div class="container p-5">
            <div class="card text-center">
                <div class="card-header ques-header">
                    <a href="{{ url('/') }}">
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
                        <div class="container" id="img">
                            <img src="{{ asset($que->file_path) }}" alt="question image" style="height: 400px" />
                        </div>
                    @endif
                    @if ($que->video_path != null)
                        <video src="{{ asset($que->video_path) }}" id="vid" style="width: 100%" type="video/mp4"
                            style="height: 400px" controls></video>
                    @endif
                    @if ($que->ans_video_path != null)
                        <video src="{{ asset($que->ans_video_path) }}" id="ans_video" style="width: 100%; display: none;"
                            type="video/mp4" style="height: 400px" controls></video>
                    @endif
                    <div class="container">
                        <h4 id="question">{{ $que->question }}<span class="float-right" id="timer"></span>
                        </h4>
                    </div>

                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $que->id }}" />
                        <input type="hidden" name="series_id" value="{{ $ser_qu->id }}" />
                        <input type="hidden" name="page_id" value="{{ $ser_qu->id }}" />

                        <div class="container" id="question_set">

                            <div class="input-group mb-3" onclick="op1()">
                                <div class="input-group-text" id="div_op1">
                                    <label for="op1">A</label>
                                    <input type="checkbox" value="A"
                                        aria-label="Checkbox for following text input"id="op1" name="op1"
                                        hidden />
                                </div>
                                <label for="op1" class="form-control ques-option" id="op1l"
                                    aria-label="Text input with checkbox">{{ $que->option1 }}</label>
                            </div>

                            <div class="input-group mb-3" onclick="op2()">
                                <div class="input-group-text" id="div_op2">
                                    <label for="op2">B</label>
                                    <input type="checkbox" value="B"
                                        aria-label="Checkbox for following text input"id="op2" name="op2"
                                        hidden />
                                </div>
                                <label for="op2" class="form-control ques-option" id="op2l"
                                    aria-label="Text input with checkbox">{{ $que->option2 }}</label>
                            </div>

                            @if ($que->option3)
                                <div class="input-group mb-3" onclick="op3()">
                                    <div class="input-group-text" id="div_op3">
                                        <label for="op3">C</label>
                                        <input type="checkbox" value="C"
                                            aria-label="Checkbox for following text input"id="op3" name="op3"
                                            hidden />
                                    </div>
                                    <label for="op3" class="form-control ques-option" id="op3l"
                                        aria-label="Text input with checkbox">{{ $que->option3 }}</label>
                                </div>
                            @endif

                            @if ($que->option4)
                                <div class="input-group mb-3" onclick="op4()">
                                    <div class="input-group-text" id="div_op4">
                                        <label for="op4">D</label>
                                        <input type="checkbox" value="D"
                                            aria-label="Checkbox for following text input"id="op4" name="op4"
                                            hidden />
                                    </div>
                                    <label for="op4" class="form-control ques-option" id="op4l"
                                        aria-label="Text input with checkbox">{{ $que->option4 }}</label>
                                </div>
                            @endif
                            <div class="input-group mb-3" onclick="" hidden>
                                <div class="input-group-text">
                                    <label for="op4">E</label>
                                    <input type="checkbox" value="E" aria-label="Checkbox for following text input"
                                        id="op5" name="op5" hidden />
                                </div>
                                <label for="op5" class="form-control ques-option" id="op5l"
                                    aria-label="Text input with checkbox"></label>
                            </div>
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

@section('script')
    <script>
        function question_time() {
            var op5 = document.getElementById('op5');

            var ca1 = document.getElementById("op1");
            var ca2 = document.getElementById("op2");

            if (document.getElementById("op3")) {
                var ca3 = document.getElementById("op3");
            }
            if (document.getElementById("op4")) {
                var ca4 = document.getElementById("op4");
            }

            if (ca1.checked == false && ca2.checked == false && ca3.checked == false && ca4.checked == false) {

                op5.checked = true;
            }
            validate();
            console.log(op5.checked);
        }

        $(document).ready(function() {
            var timer = document.getElementById('timer');
            var time = 300;
            var time_qu = setInterval(timerr, 1000);
            console.log(time);

            function timerr() {
                if (time == 0 || time < 0) {
                    clearInterval(time_qu);
                    question_time();
                    timer.innerHTML = "Time's Up!";
                }
                if (time > 0) {
                    time = time - 1;
                    timer.innerHTML = time;
                }
            }
        });
    </script>
@endsection
