@extends('layouts.frontend.body')

@section('title')
    Articles
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>
';" aria-label="breadcrumb" class="sticky-top">
        <ol class="breadcrumb" style="height: 7vh; background-color: white;">
            <h4 class="mt-3 mx-5">
                @if ($seriesType->id == 1)
                    <a href="{{ url('/code-de-la-route', $seriesType->id) }}">
                        < Back</a>
                        @elseif ($seriesType->id == 2)
                            <a href="{{ url('/permis-de-Conduir-B', $seriesType->id) }}">
                                < Back</a>
                                @elseif ($seriesType->id == 3)
                                    <a href="{{ url('/formation-VTC', $seriesType->id) }}">
                                        < Back</a>
                                        @elseif ($seriesType->id == 4)
                                            <a href="{{ url('/formation-TAXI', $seriesType->id) }}">
                                                < Back</a>
                @endif
            </h4>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="container">
                <h3>{{ $seriesType->seriestype }}</h3>
                <br />
                @if (!$article->isEmpty())
                    @foreach ($articleType as $at)
                        @foreach ($article as $art)
                            @if ($at->id == $art->article_type_id)
                                <div class="container-fluid card p-3 mt-3"
                                    style="border-radius: 20px; background-color: #efefef">
                                    <h4>
                                        {{ $at->articleType }}
                                    </h4>
                                    @foreach ($article as $arti)
                                        @if ($at->id == $arti->article_type_id)
                                            <div class="container-fluid mt-2">
                                                <a class="btn btn-cus " style="width: 100%; color: white;"
                                                    href="{{ url('article/show/article', $arti->id) }}">
                                                    {{ $arti->article_title }}
                                                    <i class="fas fa-arrow-circle-right float-right"
                                                        style="font-size: 2.3vh"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @break
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="col-md-1"></div>
<div class="col-md-3"></div>
</div>
@endsection
