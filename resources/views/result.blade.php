@extends('layouts.frontend.body')

@section('title')
    Result
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container p-5">
            <div class="card text-center">
                <div class="card-header">
                    <a href="/">
                        <i class="fas fa-times float-left" style="font-size: x-large"></i></a>
                    {{ $series->name }}
                </div>
                <div class="card-body">
                    <h3>Little by little the bird takes the nest</h3>
                    <h4>Take flight now by subscribing to the License Pack</h4>
                    <h1>{{ $test->last_score }} correct out of {{ $ques_count }}</h1>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                            style="width: {{ ($test->last_score / $ques_count) * 100 }}%"
                            aria-valuenow="{{ ($test->last_score / $ques_count) * 100 }}" aria-valuemin="0"
                            aria-valuemax="100">{{ ($test->last_score / $ques_count) * 100 }}%</div>
                    </div>
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
                    <div class="accordion" id="accordionExample">
                        <input type="hidden" value="{{ $i = 1 }}">
                        @foreach ($final_res as $fres)
                            @if ($fres->result == 1)
                                <div class="accordion-item   mb-2">
                                    <h2 class="accordion-header" id="heading{{ $i }}">
                                        <button class="accordion-button acco-wd" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $i }}" aria-expanded="true"
                                            aria-controls="collapse{{ $i }}">
                                            <a type="button" class="series-btn"><i class="fas fa-check text-success"></i>
                                                &nbsp;Question {{ $i }}</a>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($fres->file_path != null)
                                                <img src="{{ asset($fres->file_path) }}" class="img-size">
                                            @endif
                                            @if ($fres->video_path != null)
                                                <video src="{{ asset($fres->video_path) }}" class="img-size"
                                                    type="video/mp4" controls></video>
                                            @endif
                                            <h4>{{ $fres->question }}</h4>
                                            <h4>Your Answer: {{ $fres->user_answer }}</h4>
                                            <p>{{ $fres->ques_desc }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $i }}">
                                        <button class="accordion-button acco-wd" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $i }}" aria-expanded="true"
                                            aria-controls="collapse{{ $i }}">
                                            <a type="button" class="series-btn"><i class="fas fa-times text-danger"></i>
                                                &nbsp;Question {{ $i }}</a>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($fres->file_path != null)
                                                <img src="{{ asset($fres->file_path) }}" class="img-size">
                                            @endif
                                            @if ($fres->video_path != null)
                                                <video src="{{ asset($fres->video_path) }}" class="img-size"
                                                    type="video/mp4" controls></video>
                                            @endif
                                            <h4>{{ $fres->question }}</h4>
                                            <h4>Your Answer: {{ $fres->user_answer }}</h4>
                                            <p>{{ $fres->ques_desc }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" value="{{ $i = $i + 1 }}">
                        @endforeach
                    </div>
                </div>


                <div class="container" id="themes" style="display: none;">

                    @if ($t_security != '0')
                        <h4 class="float">Security &nbsp; {{ $a_security }}/{{ $t_security }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width: {{ ($a_security / $t_security) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif


                    @if ($t_users != '0')
                        <h4 class="float">Users &nbsp; {{ $a_users }}/{{ $t_users }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width: {{ ($a_users / $t_users) * 100 }}%;" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif


                    @if ($t_legislative != '0')
                        <h4 class="float">Legislative &nbsp; {{ $a_legislative }}/{{ $t_legislative }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width: {{ ($a_legislative / $t_legislative) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_cockpit != '0')
                        <h4 class="float">cockpit &nbsp; {{ $a_cockpit }}/{{ $t_cockpit }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width: {{ ($a_cockpit / $t_cockpit) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_various != '0')
                        <h4 class="float">various &nbsp; {{ $a_various }}/{{ $t_various }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_various / $t_various) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_driver != '0')
                        <h4 class="float">various &nbsp; {{ $a_driver }}/{{ $t_driver }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_driver / $t_driver) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_regulations != '0')
                        <h4 class="float">various &nbsp; {{ $a_regulations }}/{{ $t_regulations }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_regulations / $t_regulations) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_mechanical != '0')
                        <h4 class="float">various &nbsp; {{ $a_mechanical }}/{{ $t_mechanical }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_mechanical / $t_mechanical) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_ecology != '0')
                        <h4 class="float">various &nbsp; {{ $a_ecology }}/{{ $t_ecology }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_ecology / $t_ecology) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                    @if ($t_aids != '0')
                        <h4 class="float">various &nbsp; {{ $a_aids }}/{{ $t_aids }}</h4>
                        <div class="container mb-2">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-label="Example 20px high"
                                    style="width:  {{ ($a_aids / $t_aids) * 100 }}%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="container">
                    <div class="card-footer text-muted"><button type="button" class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            A doubt? <br /> Our expert can answer that
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <button class="btn btn-warning sticky-bottom"><a href="/">Home</a></button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h4>Spend the second</h4>
                            <h5>with our permit pack formula, an expert answers all your
                                questions
                            </h5>
                            <h4><b>Question about the License Pack?</b></h4>
                            <span>call 123 456 789</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning">Discover the license Pack</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
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
