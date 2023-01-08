<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Series</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container m-5">
        <form action="{{ route('series.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col">
                    <label for="series_name">Series Name</label>
                    <input type="text" id="series_name" name="series_name" class="form-control"
                        placeholder="Enter series name" aria-label="series_name" required>
                </div>
                <div class="col">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" aria-label="quantity" name="quantity" required>
                </div>
                <label for="series_type">Series Type</label>
                <select class="form-select" id="series_type" name="series_type" aria-label="Default select example"
                    required>
                    <option selected>Series Type</option>
                    <option value="Code de la Route">Code de la Route</option>
                    <option value="Permis de Conduir B">Permis de Conduir B</option>
                    <option value="Formation VTC">Formation VTC</option>
                    <option value="Formation TAXI">Formation TAXI</option>
                </select>
                <select class="form-select" id="section_type" name="section_type" aria-label="Default select example"
                    required>
                    <option selected>Section Type</option>
                    <option value="simple">Simple Series</option>
                    <option value="Examens">Examens Series</option>
                </select>
                <select class="form-select" id="belongs" name="belongs" aria-label="Default select example" required>
                    <option selected>belongs to</option>
                    <option value="discovery">Discovery Series</option>
                    <option value="classic">Classic Series</option>
                </select>
            </div>
            <br />

            <br />
            <a type="submit" class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
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
