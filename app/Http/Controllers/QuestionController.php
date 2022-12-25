<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Series;
use App\Models\Question;
use App\Models\TestAnswer;
use Illuminate\Http\Request;
use App\Models\CompletedQuestion;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = Test::find(request('id'));
        // dd(CompletedQuestion::where('id', request('id'))->where('user_id', Auth::user()->id)->first());
        // $cq = CompletedQuestion::where('id', request('id'))->where('user_id', Auth::user()->id)->first();

        // $questions = Question::where('series_id', $cq->series_id)->get();

        // if (count($questions) == $cq->question_count) {
        //     return redirect(route('question.show', $questions[0]->id));
        // }
        // return redirect(route('question.show', $questions[$cq->question_count]->id));
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
        $answer = $request->op1 ? $request->op1 : '';
        $answer .= $request->op2 ? $request->op2 : '';
        $answer .= $request->op3 ? $request->op3 : '';
        $answer .= $request->op4 ? $request->op4 : '';

        TestAnswer::updateOrCreate([
            'user_id' => auth()->user()->id,
            'series_id' => $request->series_id,
            'question_id' => $request->question_id,
        ], ['answer' => $answer]);

        //get all questions from db based on series id
        // dd($request->series_id);
        $cq = CompletedQuestion::where('series_id', $request->series_id)->where('user_id', Auth::user()->id)->first();

        if($cq == null){
            CompletedQuestion::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $request->series_id,
                'question_count' => 1,
            ]);
        }
        elseif($cq != null){
            CompletedQuestion::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $request->series_id,
            ], ['question_count' => $cq->question_count + 1,]);
        }
        // comparing answers

        $user_answer = TestAnswer::where('series_id', $request->series_id)->where('user_id', Auth::user()->id)->where('question_id', $request->question_id)->get();

        $ques_answer = Question::where('series_id', $request->series_id)->where('id', $request->question_id)->get();

        // dd($user_answer[0]->answer);
        // dd($ques_answer[0]->answer);

        $res = Result::where('series_id', $request->series_id)->where('user_id', Auth::user()->id)->first();
        // dd($res != null);

        if($user_answer[0]->answer == $ques_answer[0]->answer){
            if($res == null){
                $score = '1';
            }
            elseif($res != null){
                $score = $res->score + 1;
            }
            Result::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $request->series_id,
            ], ['score' => $score]);
        }

        return redirect(route('question.edit', $request->series_id)); // sending series id
        // moved down to edit function
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $ser = Series::find($id);
        $question = Question::where('series_id', $ser->id)->get();
        $cq = CompletedQuestion::where('user_id', Auth::user()->id)->where('series_id', $id)->first();
        if($cq != null){
            // dd($question[$cq->question_count]);
            $question = $question[$cq->question_count];
        }
        elseif($cq == null){
            // dd($question);
            $question = $question[0];
        }

        // dd($cq);
        if($cq == null){
            $count = '1';
        }
        if($cq != null){
            $count = $cq->question_count + 1;
        }
        // dd($count);
        return view('question', [
            'que' => $question,
            'ser_qu' => $ser,
            'ques_count' => $count,
            'total_ques' => count($ser->questions)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cq = CompletedQuestion::where('series_id', $id)->where('user_id', Auth::user()->id)->first();
        $questions = Question::where('series_id', $id)->get();

        $test = Test::where('user_id', Auth::user()->id)->where('series_id', $cq->series_id)->first();
        $res = Result::where('series_id', $id)->where('user_id', Auth::user()->id)->first();
        // dd($test->completed_series + 1);
        $qc = '0';
        // if($cq->question_count == count($questions)){        // uncomment this line after testing
            $a=1;
            if($a = 1){

            CompletedQuestion::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $id
            ], ['question_count' => $qc,]);

            if($test == null){
                if($res != null){
                    Test::updateOrCreate([
                        'user_id' => Auth::user()->id,
                        'series_id' => $cq->series_id,
                    ], [
                        'last_score' => $res->score,
                        'best_score' => $res->score,
                        'completed_series' => '1'
                    ]);
                }
            }
            if($test != null){
                if($res != null){
                    if(($res->score) > ($test->best_score)){
                        dd("best score");
                        Test::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'series_id' => $cq->series_id,
                        ], [
                            'last_score' => $res->score,
                            'best_score' => $res->score,
                            'completed_series' => $test->completed_series + 1
                        ]);
                    }
                    else{
                        // dd($res->score);
                        Test::updateOrCreate([
                            'user_id' => Auth::user()->id,
                            'series_id' => $cq->series_id,
                            'best_score' => $test->best_score,
                        ], [
                            'last_score' => $res->score,
                            'completed_series' => $test->completed_series + 1
                        ]);
                    }
                }
            }

            // setting the default value of result after creating of result
            Result::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $id,
            ], ['score' => '0']);

            return redirect('result'); // sending series id to result index
        }
        else
        {
            $question = Question::find($questions[$cq->question_count]->id);
            $ser = Series::find($question->series_id);
            $cq = CompletedQuestion::where('series_id', $ser->id)->where('user_id', Auth::user()->id)->first();

            if($cq == null){
                $count = '1';
            }
            if($cq != null){
                $count = $cq->question_count + 1;
            }

            return view('question', [
                'que' => $question,
                'ser_qu' => $ser,
                'ques_count' => $count,
                'total_ques' => count($ser->questions)
            ]);
        }
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
