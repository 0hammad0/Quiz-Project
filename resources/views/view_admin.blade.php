@extends('layouts.backend.body')

@section('title')
    Admin Title
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            Tables
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Table</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container card">
            <div class="container">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Question:</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ $question->question }}">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="Correction" class="form-label">Correction</label>
                    <textarea readonly cols="50" rows="8" type="text" class="form-control" name="desc" id="Correction">{{ $question->description }}</textarea>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="option_a" class="form-label">option A</label>
                    <input readonly type="text" class="form-control" id="option_a" name="option_a"
                        value="{{ $question->option1 }}">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="option_b" class="form-label">option B</label>
                    <input readonly type="text" class="form-control" id="option_b" name="option_b"
                        value="{{ $question->option2 }}">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="option_c" class="form-label">option C</label>
                    <input readonly type="text" class="form-control" name="option_c" id="option_c"
                        value="{{ $question->option3 }}">
                </div>
                <div class="mb-3">
                    <label for="option_d" class="form-label">option D</label>
                    <input readonly name="option_d" type="text" class="form-control" id="option_d"
                        value="{{ $question->option4 }}">
                </div>
                <div class="mb-3">
                    <label for="Correct_Answer" class="form-label">Correct Answer</label>
                    <input readonly type="text" class="form-control" id="Correct_Answer" value="{{ $question->answer }}">
                </div>
                <div class="mb-3">
                    <label for="Question_Type" class="form-label">Question Type</label>
                    <input readonly type="text" class="form-control" id="Question_Type"
                        value="{{ $question->question_type }}">
                </div>
                <div class="mb-3">
                    <label for="Question_Cateogry" class="form-label">Question Cateogry</label>
                    <input readonly type="text" class="form-control" id="Question_Cateogry"
                        value="{{ $question->question_category }}">
                </div>
                <div class="mb-3">
                    @if ($question->video_path != null)
                        <label for="Question_Video" class="form-label">Question Video</label>
                        <video id="Question_Video" src="{{ asset($question->video_path) }}" style="width: 50%"
                            type="video/mp4" controls></video>
                    @endif
                    @if ($question->file_path != null)
                        <label for="Question_Image" class="form-label">Question Image</label>
                        <img src="{{ asset($question->file_path) }}" alt="question image" id="Question_Image"
                            style="width: 50%" />
                    @endif
                </div>
                @if ($question->audio_path != null)
                    <audio controls>
                        <source src="{{ asset($question->audio_path) }}" type="audio/ogg">
                        <source src="{{ asset($question->audio_path) }}" type="audio/mpeg">
                    </audio>
                @endif
                <h4>Answer Video</h4>
                <div class="mb-3">
                    @if ($question->ans_video_path != null)
                        <label for="answer_Video" class="form-label">Answer Video</label>
                        <video id="answer_Video" src="{{ asset($question->ans_video_path) }}" style="width: 50%"
                            type="video/mp4" controls></video>
                    @endif
                </div>
                <a type="button" class="btn btn-primary" href="{{ url()->previous() }}">back</a>
                <a type="button" class="btn btn-primary" href="{{ route('adminpanel.edit', $question->id) }}">Edit</a>
            </div>
        </div>
    </main>
@endsection
