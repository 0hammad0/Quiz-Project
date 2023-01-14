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
                            <h3 class="state_number">Your numbers</h3>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6">
                            <ul class="stats_ul" hidden>
                                <li class="state_li"><a href="">Week</a></li>
                                <li class="state_li"><a href="">Month</a></li>
                                <li class="state_li"><a href="">Total</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        {{-- lg --}}
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                @if ($averageGrade == 'N/A')
                                    {{ $averageGrade }}
                                @else
                                    {{ $averageGrade }}/40
                                @endif
                                <br />
                                <span class="stat-span">Avarage Grade</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                @if ($bestScore == 'N/A')
                                    {{ $bestScore }}
                                @else
                                    {{ $bestScore }}/40
                                @endif
                                <br />
                                <span class="stat-span">Best Grade</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>
                                @if ($questions == 'N/A')
                                    {{ $questions }}
                                    @else{{ $questions * 40 }}
                                @endif <br />
                                <span class="stat-span">Questions</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>{{ $streak->longestStreak }} day <br />
                                <span class="stat-span">Longest Streak</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>{{ $workouts }} <br />
                                <span class="stat-span">Workouts</span>
                            </h2>
                        </div>
                        <div class="col-4 mt-4 stat-box-lg">
                            <h2>{{ $mock }} <br />
                                <span class="stat-span">Mock</span>
                            </h2>
                        </div>

                        {{-- sm --}}
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                @if ($averageGrade == 'N/A')
                                    {{ $averageGrade }}
                                @else
                                    {{ $averageGrade }}/40
                                @endif <br />
                                <span class="stat-span">Avarage Grade</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                @if ($bestScore == 'N/A')
                                    {{ $bestScore }}
                                @else
                                    {{ $bestScore }}/40
                                @endif <br />
                                <span class="stat-span">Best Grade</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>
                                @if ($questions == 'N/A')
                                    {{ $questions }}
                                    @else{{ $questions * 40 }}
                                @endif <br />
                                <span class="stat-span">Questions</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>{{ $streak->longestStreak }} <br />
                                <span class="stat-span">Longest Streak</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>{{ $workouts }} <br />
                                <span class="stat-span">Workouts</span>
                            </h2>
                        </div>
                        <div class="col-6 stat-box-sm mt-3">
                            <h2>{{ $mock }} <br />
                                <span class="stat-span">Mock</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="container-fluid card p-4 text-center mt-3" style="border-radius: 15px">
                    <div class="container mb-5">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script type="text/javascript">
        var userData = <?php echo json_encode($graph); ?>;
        Highcharts.chart('container', {
            title: {
                text: 'Progression'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Score'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Series',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endsection
