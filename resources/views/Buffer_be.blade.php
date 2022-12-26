@extends('layouts.frontend.body')

@section('title')
    Buffer
@endsection

@section('content')
    <div class="container buffer">
        <div class="container-fluid buffer-box">
            <div class="container pt-3 pb-3">
                <h1 class="text-center">{{ $rec->name }}</h1>

                <h3 class="text-center">{{ $rec->series_type }} Series</h3>

                <div class="container text-center pt-4">
                    <a href="{{ route('question.show', $rec->id) }}"><i
                            class="fas fa-arrow-circle-right float-end text-warning" style="font-size: xxx-large"></i></a>
                </div>
                <div class="container text-center">
                    @if ($rec->series_type == 'discovery')
                        <p>Stressed about starting your code reviews? </p>

                        <p> Embark in peace with these series of 10 easier questions 😎</p>
                    @endif
                    @if ($rec->series_type == 'classic')
                        <p>In the beginning there were 40 questions, in the end there will be none left.</p>

                        <p>Take your time, this is a workout! 😇</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
