@extends('layouts.frontend.body')

@section('title')
    Statistiques
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>
';" aria-label="breadcrumb" class="sticky-top">
        <ol class="breadcrumb" style="height: 7vh; background-color: white;">
            <h4 class="mt-3 mx-5">
                <a href="{{ url()->previous() }}">
                    < Back</a>
            </h4>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container">
                <div class="container-fluid card p-4 text-center" style="border-radius: 15px">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3 class="state_number">Over all stats</h3>
                        </div>
                    </div>
                    <div class="row">
                        {{-- lg --}}
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                {{ $totalSeriesDoneByUser }}
                                <br />
                                <span class="stat-span">Completed Series</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                {{ $totalCorrectAnswers }}
                                <br />
                                <span class="stat-span">Correct Answers</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                {{ $totalWrongAnswers }}
                                <br />
                                <span class="stat-span">Wrong Answer</span>
                            </h2>
                        </div>

                        {{-- sm --}}
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                {{ $totalSeriesDoneByUser }} <br />
                                <span class="stat-span">Avarage Grade</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                {{ $totalWrongAnswers }} <br />
                                <span class="stat-span">Best Grade</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                {{ $totalSeriesDoneByUser }} <br />
                                <span class="stat-span">Wrong Answer</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
