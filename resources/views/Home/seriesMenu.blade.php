@extends('layouts.frontend.Home_body')

@section('title')
    Section Menu
@endsection

@section('content')
    <div class="news_section layout_padding">
        <div class="container text-center">
            <h1 class="">Entertainments au code</h1>
            <div class="row row-cols-2" style="margin-bottom: 24px;">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('series-id-redirect', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            Series Simples
                            <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('series-id-redirect-examens', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            Examens blancs
                            <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('/statistiques', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            Statistiques
                            <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ route('mistakes.show', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            Mes erreurs
                            @if ($mistakes == 0)
                                <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                            @else
                                <span class="mistakes">{{ $mistakes }}</span>
                            @endif
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h1 class="">Revisitions mes cours</h1>
            <div class="row row-cols-2" style="margin-bottom: 24px;">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{ url('/articles', $seriesTypeID->id) }}">
                        <button type="button" class="series-btn q-btn">
                            Articles
                            <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <a href={{ url('/learning-Video', $seriesTypeID->id) }}>
                        <button type="button" class="series-btn q-btn">
                            Learning
                            <i class="fas fa-arrow-circle-right float-end text-danger" style="font-size: 20px"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
