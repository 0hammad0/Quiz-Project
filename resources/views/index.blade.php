@extends('layouts.frontend.home_body')

@section('title')
    PermisGo
@endsection

@section('content')
    @if (!$Examens)
        <div class="news_section layout_padding">
            <div class="container text-center">
                <h1 class="">Discovery series (10 questions)</h1>
                <div class="row row-cols-2" style="margin-bottom: 24px;">

                    @foreach ($disco as $disc)
                        @if ($disc)
                            <div class="col-md-6" style="padding-top: 5px">
                                <a href="{{ route('series.show', $disc) }}">
                                    <button type="button" class="series-btn q-btn">
                                        {{ $disc->name }} &nbsp;&nbsp;&nbsp;
                                        <i class="fas fa-arrow-circle-right float-end text-danger"
                                            style="font-size: 20px"></i>
                                    </button>
                                </a>
                            </div>
                        @else
                            <h4>There are no series right now</h4>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="container text-center">
                <h1 class="">Classic series (40 questions)</h1>
                <div class="row row-cols-2">
                    @foreach ($classic as $cla)
                        @if ($cla)
                            <div class="col-md-6" style="padding-top: 5px">
                                <a href="{{ route('series.show', $cla) }}">
                                    <button type="button" class="series-btn q-btn">
                                        {{ $cla->name }} &nbsp;&nbsp;&nbsp;
                                        <i class="fas fa-arrow-circle-right float-end text-danger"
                                            style="font-size: 20px"></i>
                                    </button>
                                </a>
                            </div>
                        @else
                            <h4>There are no series right now.</h4>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="news_section layout_padding">
            <div class="container text-center">
                <h1 class="">Examens Series</h1>
                <div class="row row-cols-2" style="margin-bottom: 24px;">

                    @foreach ($Examens as $Examen)
                        @if ($Examen)
                            <div class="col-md-6" style="padding-top: 5px">
                                <a href="{{ route('series.show', $Examen) }}">
                                    <button type="button" class="series-btn q-btn">
                                        {{ $Examen->name }} &nbsp;&nbsp;&nbsp;
                                        <i class="fas fa-arrow-circle-right float-end text-danger"
                                            style="font-size: 20px"></i>
                                    </button>
                                </a>
                            </div>
                        @else
                            <h4>There are no series right now</h4>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
