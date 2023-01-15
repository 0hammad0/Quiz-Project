<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\SeriesType;
use App\Models\Stats;
use App\Models\Test;
use App\Models\TestAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function statistiques($id)
    {
        $seriesTypeId = SeriesType::findOrFail($id);

        $series = Series::where('series_type', $seriesTypeId->seriestype)
        ->get();

        $testMock = Test::where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->where('sectionType', 'Examens')
        ->get();

        $test = Test::where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->where('sectionType', 'simple')
        ->get();

        $graph = Test::select(DB::raw('CAST(last_score as UNSIGNED) as count'))->where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->where('sectionType', 'simple')
        ->get('last_score')
        ->pluck('count');

        $date = Test::select('updated_at')
        ->where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->where('sectionType', 'simple')
        ->pluck('updated_at');

        $testlatest = Test::where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->latest();

        $averageGrade = 0;
        foreach($test as $tests) {
            $averageGrade =$averageGrade + $tests->best_score;
        }

        // Average Grade
        if(count($test) == 0)
            $avgGrade = 'N/A';
        else
            $avgGrade = round(count($test)/count($test));

        if(count($test) == 0)
            $queCount = 'N/A';
        else
            $queCount = count($test);

        // Best Score
        if($test->max('best_score') == null)
            $bstScr = 'N/A';
        else
            $bstScr = $tests->max('best_score');

        // Total Series
        if($test == null)
            $workouts = 'N/A';
        else
            $workouts = count($test);

        // Mock Check
        if($testMock == null)
            $mock = 'N/A';
        else
            $mock = count($testMock);

        $testlatest = Test::where('user_id', Auth::user()->id)
        ->where('seriesType_id', $seriesTypeId->id)
        ->latest()->first();

        if($testlatest != null)
            $st = $testlatest->updated_at->format('d-m-y');
        else
            $st = "0-0-0";

        if($st == Carbon::today()->format('d-m-y'))
        {
            $isStats = Stats::where('user_id', Auth::id())
            ->where('seriesType_id', $seriesTypeId->id)
            ->first();

            if($isStats != null) {
                $countStreak = $isStats->streak;

                if(($isStats->streak) > ($isStats->longestStreak))
                    $lngstrk = $isStats->streak;
                else
                    $lngstrk = 1;

                if($isStats->updated_at->format('d-m-y') != Carbon::today()->format('d-m-y')) {
                    Stats::updateOrCreate([
                        'user_id' => Auth::id(),
                        'seriesType_id' => $seriesTypeId->id
                    ], [
                        'streak' => $countStreak + 1,
                        'longestStreak' => $lngstrk
                    ]);
                }
            }
            else {
                Stats::updateOrCreate([
                    'user_id' => Auth::id(),
                    'seriesType_id' => $seriesTypeId->id
                ], [
                    'streak' => 1,
                    'longestStreak' => 1
                ]);
            }
        }
        else {
            $isStats = Stats::where('user_id', Auth::id())
            ->where('seriesType_id', $seriesTypeId->id)
            ->first();

            if($isStats != null) {
                Stats::updateOrCreate([
                    'user_id' => Auth::id(),
                    'seriesType_id' => $seriesTypeId->id
                ], [
                    'streak' => 0,
                    'longestStreak' => $isStats->longestStreak
                ]);
            }
            else {
                Stats::updateOrCreate([
                    'user_id' => Auth::id(),
                    'seriesType_id' => $seriesTypeId->id
                ], [
                    'streak' => 0,
                    'longestStreak' => 0
                ]);
            }
        }

        return view('Home.statistiques', ([
            'graph' => $graph,
            'graphDate' => $date,
            'series' => $series,
            'test' => $test,
            'averageGrade' => $avgGrade,
            'bestScore' => $bstScr,
            'questions' => $queCount,
            'workouts' => $workouts,
            'mock' => $mock,
            'streak' => Stats::where('user_id', Auth::id())->where('seriesType_id', $seriesTypeId->id)->first('longestStreak')
        ]));
    }
}
