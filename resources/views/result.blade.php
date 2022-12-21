@extends('layouts.frontend.body')

@section('title')
    Result
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container p-5">
            <div class="card text-center">
                <div class="card-header">
                    <a href="index.html">
                        <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                    Series 1
                </div>
                <div class="card-body">
                    <h3>Little by little the bird takes the nest</h3>
                    <h4>Take flight now by subscribing to the License Pack</h4>
                    <h1>7 correct out of 10</h1>
                    <hr />
                    <button class="btn btn-outline-success" onclick="fixes()">
                        Fixes
                    </button>
                    <button class="btn btn-outline-success" onclick="themes()">
                        Themes
                    </button>
                </div>
                <hr />
                <div class="container" id="fixes">
                    <div class="col-md" style="padding-top: 5px">
                        <a type="button" class="series-btn" href=""><i class="fas fa-times text-danger"></i>
                            &nbsp;Issue 1</a>
                    </div>
                    <div class="col-md" style="padding-top: 5px">
                        <a type="button" class="series-btn" href=""><i class="fas fa-check text-success"></i>
                            &nbsp;Issue 2</a>
                    </div>
                </div>


                <div class="container" id="themes" style="display: none;">

                    <h4 class="float">Security &nbsp; 1/2</h4>
                    <div class="container">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 50%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>


                    <h4 class="float">Users &nbsp; 2/3</h4>
                    <div class="container">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 66%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>


                    <h4 class="float">Legislative &nbsp; 1/2</h4>
                    <div class="container">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 50%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>


                    <h4 class="float">cockpit &nbsp; 2/2</h4>
                    <div class="container">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 100%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>


                    <h4 class="float">various &nbsp; 1/1</h4>
                    <div class="container">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 100%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card-footer text-muted">
                        <a href="/results.html" class="btn btn-danger">A doubt? <br /> Our expert can answer that
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <button class="btn btn-warning sticky-bottom">Next Series</button>
        </div>


        <script>
            function themes() {
                var a = document.getElementById("fixes");
                var b = document.getElementById("themes");
                a.style.display = "none";
                b.style.display = "block";
            }

            function fixes() {
                var a = document.getElementById("fixes");
                var b = document.getElementById("themes");
                a.style.display = "block";
                b.style.display = "none";
            }
        </script>
    @endsection
