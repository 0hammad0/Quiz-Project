@extends('layouts.frontend.body')

@section('title')
    Buffer
@endsection

@section('content')
    <div class="container buffer">
        <div class="container-fluid buffer-box">
            <div class="container pt-3 pb-3">
                <h1 class="text-center">{{ $disc->name }}</h1>

                @if ($disc->section == 1)
                    <h3 class="text-center">Discovery Series</h3>
                @elseif ($disc->section == 2)
                    <h3 class="text-center">Classic Series</h3>
                @endif

                <div class="container text-center pt-4">
                    <a href="/discovery/{{ $disc->id }}/question"><i
                            class="fas fa-arrow-circle-right float-end text-warning" style="font-size: xxx-large"></i></a>
                </div>
                <div class="container text-center">
                    <h3>Best Score: &nbsp; {{ $rec->best_score }}</h3>
                    <h3>Completed Series: &nbsp; {{ $rec->completed_series }}</h3>
                    <h3>Last Score: &nbsp; {{ $rec->last_score }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection