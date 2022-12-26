<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Models\CompletedQuestion;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classic = Series::getSeriesType('classic')->get();
        $descovery = Series::getSeriesType('discovery')->get();
        // dd($classic);
        return view('index', [
            'classic' => $classic,
            'disco' => $descovery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        $rec = Test::where('user_id', auth()->user()->id)->where('series_id', $series->id)->first();
        $c_q = CompletedQuestion::where('user_id', Auth::user()->id)->where('series_id', $series->id)->first();

        if($c_q && $rec){
            return view('buffer', [
                'rec' => $rec,
                'rec_name' => $series,
                'ques_count' => count(Question::where('series_id', $series->id)->get())
            ]);
        }
        elseif($c_q)
        {
            $question = Question::where('series_id', $series->id)->get();

            return view('Buffer_be', [
                'rec' => $series, // using series to access question
                'question' => $question[$c_q->question_count], // using question id to access question
                'ques_count' => count(Question::where('series_id', $series->id)->get())
            ]);
        }
        else
        {
            return view('Buffer_be', [
                'rec' => $series,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
