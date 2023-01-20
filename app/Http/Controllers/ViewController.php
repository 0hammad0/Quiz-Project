<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Series;
use App\Models\Mistake;
use App\Models\Question;
use App\Models\SeriesType;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function View($id)
    {
        if(Auth::user()->admin == 1) {
            return view('view_admin', [
                'question' => Question::findOrFail($id)
            ]);
        } else {
            return redirect("/");
        }
    }

    public function userDetail($id)
    {
        $totalSeries = Test::where('user_id', Auth::id())->get();

        $CorrectAnsers = Mistake::where('user_id', Auth::id())
        ->where('result', 'T')
        ->get();

        $WrongAnswers = Mistake::where('user_id', Auth::id())
        ->where('result', 'F')
        ->get();

        return view('Home.Profile', ([
            'totalSeriesDoneByUser' => count($totalSeries),
            'totalCorrectAnswers' => count($CorrectAnsers),
            'totalWrongAnswers' => count($WrongAnswers)
        ]));
    }

    public function seriesList($id)
    {
        return view('adminpanel', ([
            'series' => Series::where('series_type', SeriesType::findOrFail($id)->seriestype)->get()
        ]));
    }
}
