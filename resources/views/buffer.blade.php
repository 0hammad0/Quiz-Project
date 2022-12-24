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
                            class="fas fa-arrow-circle-right float-end text-warning" style="font-size: xxx-large"></i></a>
                </div>
                <div class="container text-center">
                    <h3>Best Score: &nbsp; {{ $rec->best_score }}/{{ $rec_name->quantity }} </h3>
                    <h3>Completed Series: &nbsp; {{ $rec->completed_series }} Times</h3>
                    <h3>Last Score: &nbsp; {{ $rec->last_score }}/{{ $rec_name->quantity }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
