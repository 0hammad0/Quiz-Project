<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container m-5">
        <form action="/update_question/{{ $question->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="series_id" value="{{ $question->series_id }}">
            <input type="hidden" name="question_type" value="{{ $question->question_type }}">
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" class="form-control" id="question"
                    value="{{ $question->question }}">
            </div>
            <div class="mb-3">
                <label for="correction" class="form-label">Correction</label>
                <textarea name="correction" id="correction" cols="80" rows="5">{{ $question->description }}</textarea>
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="option_A">Option A</label>
                    <input type="text" id="option_A" name="option_A" class="form-control"
                        value="{{ $question->option1 }}" aria-label="option_A">
                </div>
                <div class="col">
                    <label for="option_B">Option B</label>
                    <input type="text" class="form-control" value="{{ $question->option2 }}" aria-label="option_B"
                        name="option_B">
                </div>
                <div class="col">
                    <label for="option_C">Option C</label>
                    <input type="text" class="form-control" value="{{ $question->option3 }}" aria-label="option_C"
                        name="option_C">
                </div>
                <div class="col">
                    <label for="option_D">Option D</label>
                    <input type="text" class="form-control" value="{{ $question->option4 }}" aria-label="option_D"
                        name="option_D">
                </div>
            </div>
            <br />
            <div class="input-group mb-3">
                <span class="input-group-text" id="Answer">Answer</span>
                <input type="text" name="answer" class="form-control" aria-label="Answer" aria-describedby="Answer"
                    value="{{ $question->answer }}">
            </div>
            <select class="form-select" aria-label="Default select example" name="theme">
                <option selected>{{ $question->question_category }}</option>
                <option value="security">security</option>
                <option value="users">users</option>
                <option value="legislative">legislative</option>
                <option value="cockpit">cockpit</option>
                <option value="various">various</option>
                <option value="driver">driver</option>
                <option value="regulations">regulations</option>
                <option value="mechanical">mechanical</option>
                <option value="ecology">ecology</option>
                <option value="aids">aids</option>
            </select>
            <br />
            <div class="mb-3">
                <label for="audio" class="form-label">Audio file for the question</label>
                <input class="form-control" type="file" id="audio" name="audio">
                @if ($question->audio_path != null)
                    <audio controls>
                        <source src="{{ asset($question->audio_path) }}" type="audio/ogg">
                        <source src="{{ asset($question->audio_path) }}" type="audio/mpeg">
                    </audio>
                @endif
            </div>
            <br />
            <h5>Select only image or video (Do not select both)</h5>
            <div class="mb-3">
                <label for="image" class="form-label">image for the question</label>
                <input class="form-control" type="file" id="image" name="image">
                @if ($question->video_path != null)
                    <label for="Question_Video" class="form-label">Question Video</label>
                    <video id="Question_Video" src="{{ asset($question->video_path) }}" style="width: 50%"
                        type="video/mp4" controls></video>
                @endif
            </div>
            <br />
            <div class="mb-3">
                <label for="video" class="form-label">Video for the question</label>
                <input class="form-control" type="file" id="video" name="video">
                @if ($question->file_path != null)
                    <label for="Question_Image" class="form-label">Question Image</label>
                    <img src="{{ asset($question->file_path) }}" alt="question image" id="Question_Image"
                        style="width: 50%" />
                @endif
            </div>
            <div class="mb-3">
                @if ($question->ans_video_path != null)
                    <label for="ans_video" class="form-label">Answer Video for the question</label>
                    <input class="form-control" type="file" id="ans_video" name="ans_video">
                @endif
            </div>
            <br />
            <a type="button" class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
