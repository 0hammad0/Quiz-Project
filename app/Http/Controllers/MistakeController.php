<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Series;
use App\Models\Mistake;
use App\Models\Question;
use App\Models\SeriesType;
use App\Models\TestAnswer;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MistakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $series = Series::findOrFail($request->series);
        $seriesTypeId = SeriesType::where('seriestype', $series->series_type)->first();

        if($seriesTypeId->id == 1)
            return redirect('/code-de-la-route/1');
        elseif ($seriesTypeId->id == 2)
            return redirect('/permis-de-Conduir-B/2');
        elseif ($seriesTypeId->id == 3)
            return redirect('/formation-VTC/3');
        elseif ($seriesTypeId->id == 4)
            return redirect('/formation-TAXI/4');
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
        $seriesTypeId = SeriesType::where('seriestype', Series::findOrFail($request->series_id)->series_type)
        ->first('id')->id;

        $answer = $request->op1 ? $request->op1 : '';
        $answer .= $request->op2 ? $request->op2 : '';
        $answer .= $request->op3 ? $request->op3 : '';
        $answer .= $request->op4 ? $request->op4 : '';
        $answer .= $request->op5 ? $request->op5 : '';

        if(Question::findOrFail($request->question_id)->answer == $answer) {
            Mistake::updateOrCreate([
                'user_id' => Auth::id(),
                'series_id' => $request->series_id,
                'question_id' => $request->question_id,
                'seriesType_id' => $seriesTypeId,
                'sectionType' => Series::findOrFail($request->series_id)->section_type,
            ], [
                'result' => 'T'
            ]);
        }
        else {
            Mistake::updateOrCreate([
                'user_id' => Auth::id(),
                'series_id' => $request->series_id,
                'question_id' => $request->question_id,
                'seriesType_id' => $seriesTypeId,
                'sectionType' => Series::findOrFail($request->series_id)->section_type,
            ], [
                'result' => 'F'
            ]);
        }

        TestAnswer::updateOrCreate([
            'user_id' => auth()->user()->id,
            'series_id' => $request->series_id,
            'question_id' => $request->question_id,
        ], ['answer' => $answer]);

        // comparing answers
        $user_answer = TestAnswer::where('series_id', $request->series_id)->where('user_id', Auth::user()->id)->where('question_id', $request->question_id)->get();

        $ques_answer = Question::where('series_id', $request->series_id)->where('id', $request->question_id)->get();

        // dd($user_answer[0]->answer);
        // dd($ques_answer[0]->answer);

        $res = Result::where('series_id', $request->series_id)->where('user_id', Auth::user()->id)->first();

        // dd($res != null);

        if(Question::findOrFail($request->question_id)->answer == $answer){
            if($res == null){
                $score = 1;
            }
            elseif($res != null){
                $score = $res->score + 1;
            }
            Result::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $request->series_id,
            ], ['score' => $score]);
        }
        else {
            if($res == null){
                $score = 0;
            }
            elseif($res != null){
                $score = $res->score + 0;
            }
            Result::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $request->series_id,
            ], ['score' => $score]);

        }

        return redirect(route('mistakes.edit', $request->question_id, [
            'question_id' => $request->question_id,
            'series_id' => $request->series_id,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mistake = Mistake::where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();
        // dd(count($mistake) != 0);
        if(count($mistake) != 0) {

            return view('question_mistake', [
                'que' => Question::findOrFail($mistake->first()->question_id),
                'ser_qu' => $mistake->first()->series_id,
            ]);
        }
        else
            return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // Craeting final result table
        $questions = Question::findOrFail($id);

        $fr = FinalResult::where('series_id', $questions->series_id)
        ->where('user_id', Auth::user()->id)
        ->where('question_id', $questions->id)
        ->first();

        $ta = TestAnswer::where('series_id', $questions->series_id)
        ->where('question_id', $questions->id)
        ->where('user_id', Auth::user()->id)
        ->first();

        // dd($ta->answer);

        if($fr == null) {
            if(($ta->answer) == ($questions->answer)){
                $count_res = '1';}
            else
                $count_res = '0';

            // dd($questions->video_path);
            FinalResult::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $questions->series_id,
                'question_id' => $questions->id,
                'question' => $questions->question,
                'ques_answer' => $questions->answer,
                'ques_desc' => $questions->description,
                'file_path' => $questions->file_path,
                'video_path' => $questions->video_path
            ], [
                'user_answer' => $ta->answer,
                'result' => '0',
                'result_future' => $count_res
            ]);
        } // check till here only after deleting final result table every time
        elseif($fr != null) {
            if(($ta->answer) == ($questions->answer))
                $count_res = '1';
            else
                $count_res = '0';

            // dd($questions->video_path);

            FinalResult::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $questions->series_id,
                'question_id' => $questions->id,
                'question' => $questions->question,
                'ques_answer' => $questions->answer,
                'ques_desc' => $questions->description,
                'file_path' => $questions->file_path,
                'video_path' => $questions->video_path,
            ], [
                'user_answer' => $ta->answer,
                'result' => $fr->result,
                'result_future' => $count_res
            ]);
        }
        // End creating final result table


        return redirect(route('mistakes.index', [
            'series' => $questions->series_id,
        ]));
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
