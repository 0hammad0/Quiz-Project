@extends('layouts.frontend.body')

@section('title')
    Buffer
@endsection

@section('content')
    <div class="container buffer">
        <div class="container-fluid buffer-box">
            <div class="container pt-3 pb-3">
                <h1 class="text-center">{{ $rec_name->name }}</h1>

                <h3 class="text-center">{{ $rec_name->series_type }} Series</h3>

                <div class="container text-center pt-4">
                    <a href="{{ route('question.show', $rec_name->id) }}"><i
                            class="fas fa-arrow-circle-right float-end text-warning" style="font-size: xxx-large">aro</i></a>
                </div>
                <div class="container text-center">
                    <div class="container">
                        <h3>Best Score: &nbsp; {{ $rec->best_score }}/{{ $ques_count }} </h3>
                        <h3>Completed Series: &nbsp; {{ $rec->completed_series }} Times</h3>
                        <h3>Last Score: &nbsp; {{ $rec->last_score }}/{{ $ques_count }}</h3>
                    </div>
                    <br />
                    <a class="btn btn-outline-warning" href="/result/{{ $rec->id }}">last record</a>
                </div>
            </div>
        </div>
    </div>
@endsection
