<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
    </div>
    <div class="container m-5">
        <form action="{{ url('articles/store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col">
                    <label for="series_name">Article Title</label>
                    <input type="text" id="article_title" name="article_title" class="form-control"
                        placeholder="Enter title here" aria-label="article_title" required>
                </div>
                <br />
                <br />
                <select class="form-select" id="article_type" name="article_type" aria-label="Default select example"
                    required>
                    <option selected>Article Type</option>
                    @foreach ($articleType as $at)
                        <option value="{{ $at->id }}">{{ $at->articleType }}</option>
                    @endforeach
                </select>
                <br />
                <br />
                <select class="form-select" id="section_type" name="section_type" aria-label="Default select example"
                    required>
                    <option selected>Series Type</option>
                    @foreach ($seriesTypeID as $seriesTypeIDs)
                        <option value="{{ $seriesTypeIDs->id }}">{{ $seriesTypeIDs->seriestype }}</option>
                    @endforeach
                </select>
            </div>
            <br />

            <br />
            <a type="submit" class="btn btn-primary" href="{{ url('/articles/article/menu') }}">Back</a>
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
