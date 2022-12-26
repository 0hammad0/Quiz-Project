<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Result;
use App\Models\Series;
use App\Models\Question;
use App\Models\TestAnswer;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use App\Models\CompletedQuestion;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        // dd($req);

        $t_security = "0";
        $a_security = '0';
        $t_users = "0";
        $a_users = '0';
        $t_legislative = "0";
        $a_legislative = '0';
        $t_cockpit = "0";
        $a_cockpit = '0';
        $t_various = "0";
        $a_various = '0';
        $t_driver = "0";
        $a_driver = '0';
        $t_regulations = "0";
        $a_regulations = '0';
        $t_mechanical = "0";
        $a_mechanical = '0';
        $t_ecology = "0";
        $a_ecology = '0';
        $t_aids = "0";
        $a_aids = '0';

        $fr = FinalResult::where('series_id', $req->series)->where('user_id', Auth::user()->id)->get();
        $question = Question::where('series_id', $req->series)->get();

        $j = count(FinalResult::where('series_id', $req->series)->where('user_id', Auth::user()->id)->get());
        for ($i=0; $i < $j; $i++) {
            $ta = TestAnswer::where('series_id', $req->series)->where('question_id', $question[$i]->id)->where('user_id', Auth::user()->id)->first();


            // question categories filtering start

            if($question[$i]->question_category == 'security') {
                $t_security = $t_security + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_security = $a_security + 1;
                }
            }
            if($question[$i]->question_category == 'users') {
                $t_users = $t_users + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_users = $a_users + 1;
                }
            }
            if($question[$i]->question_category == 'legislative') {
                $t_legislative = $t_legislative + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_legislative = $a_legislative + 1;
                }
            }
            if($question[$i]->question_category == 'cockpit') {
                $t_cockpit = $t_cockpit + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_cockpit = $a_cockpit + 1;
                }
            }
            if($question[$i]->question_category == 'various') {
                $t_various = $t_various + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_various = $a_various + 1;
                }
            }
            if($question[$i]->question_category == 'driver') {
                $t_driver = $t_driver + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_driver = $a_driver + 1;
                }
            }
            if($question[$i]->question_category == 'regulations') {
                $t_regulations = $t_regulations + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_regulations = $a_regulations + 1;
                }
            }
            if($question[$i]->question_category == 'mechanical') {
                $t_mechanical = $t_mechanical + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_mechanical = $a_mechanical + 1;
                }
            }
            if($question[$i]->question_category == 'ecology') {
                $t_ecology = $t_ecology + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_ecology = $a_ecology + 1;
                }
            }
            if($question[$i]->question_category == 'aids') {
                $t_aids = $t_aids + 1;
                if(($ta->answer) == ($question[$i]->answer)) {
                    $a_aids = $a_aids + 1;
                }
            }

            // question categories filtering end


            FinalResult::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $req->series,
                'question_id' => $question[$i]->id,
                'question' => $question[$i]->question,
                'ques_answer' => $question[$i]->answer,
                'ques_desc' => $question[$i]->description,
                'file_path' => $question[$i]->file_path,
                'video_path' => $question[$i]->video_path
            ], [
                'user_answer' => $ta->answer,
                'result' => $fr[$i]->result_future,
                'result_future' => $fr[$i]->result_future
            ]);
        }

        $final_res = FinalResult::where('user_id', Auth::user()->id)->where('series_id', $req->series)->get();

        return view('result', ([
            'series' => Series::find($req->series),
            'test' => Test::where('series_id', $req->series)->where('user_id', Auth::user()->id)->first(),
            'ques_count' => count(Question::where('series_id', $req->series)->get()),
            'final_res' => $final_res,
            't_security' => $t_security,
            'a_security' => $a_security,
            't_users' => $t_users,
            'a_users' => $a_users,
            't_legislative' => $t_legislative,
            'a_legislative' => $a_legislative,
            't_cockpit' => $t_cockpit,
            'a_cockpit' => $a_cockpit,
            't_various' => $t_various,
            'a_various' => $a_various,
            't_driver' => $t_driver,
            'a_driver' => $a_driver,
            't_regulations' => $t_regulations,
            'a_regulations' => $a_regulations,
            't_mechanical' => $t_mechanical,
            'a_mechanical' => $a_mechanical,
            't_ecology' => $t_ecology,
            'a_ecology' => $a_ecology,
            't_aids' => $t_aids,
            'a_aids' => $a_aids,
        ]));
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

        return redirect(route('question.edit', $request->series_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ser = Series::find($id);
        $question = Question::where('series_id', $ser->id)->get();
        $cq = CompletedQuestion::where('user_id', Auth::user()->id)->where('series_id', $id)->first();
        if($cq != null){
            $question = $question[$cq->question_count];
        }
        elseif($cq == null){
            $question = $question[0];
        }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Craeting final result table
        $cq = CompletedQuestion::where('series_id', $id)->where('user_id', Auth::user()->id)->first();
        $questions = Question::where('series_id', $id)->get();
        $qid = Question::find($questions[($cq->question_count)-1]->id);
        $fr = FinalResult::where('series_id', $id)->where('user_id', Auth::user()->id)->where('question_id', $qid->id)->first();
        $ta = TestAnswer::where('series_id', $id)->where('question_id', $qid->id)->where('user_id', Auth::user()->id)->first();
        if($fr == null) {
            if(($ta->answer) == ($qid->answer)){
                $count_res = '1';}
            else
                $count_res = '0';

            // dd($qid->video_path);
            FinalResult::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $id,
                'question_id' => $qid->id,
                'question' => $qid->question,
                'ques_answer' => $qid->answer,
                'ques_desc' => $qid->description,
                'file_path' => $qid->file_path,
                'video_path' => $qid->video_path
            ], [
                'user_answer' => $ta->answer,
                'result' => '0',
                'result_future' => $count_res
            ]);
        } // check till here only after deleting final result table every time
        elseif($fr != null) {
            if(($ta->answer) == ($qid->answer))
                $count_res = '1';
            else
                $count_res = '0';

            // dd($qid->video_path);

            FinalResult::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $id,
                'question_id' => $qid->id,
                'question' => $qid->question,
                'ques_answer' => $qid->answer,
                'ques_desc' => $qid->description,
                'file_path' => $qid->file_path,
                'video_path' => $qid->video_path,
            ], [
                'user_answer' => $ta->answer,
                'result' => $fr->result,
                'result_future' => $count_res
            ]);
        }
        // End creating final result table

        $cq = CompletedQuestion::where('series_id', $id)->where('user_id', Auth::user()->id)->first();
        $questions = Question::where('series_id', $id)->get();

        $test = Test::where('user_id', Auth::user()->id)->where('series_id', $cq->series_id)->first();
        $res = Result::where('series_id', $id)->where('user_id', Auth::user()->id)->first();

        if($cq->question_count == count($questions)){        // uncomment this line after testing
            // $a=1;
            // if($a = 1){

            CompletedQuestion::updateOrCreate([
                'user_id' => Auth::user()->id,
                'series_id' => $id
            ], ['question_count' => '0',]);

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

            return redirect(route('question.index', [
                'series' => $id,
                'test' => $test
            ]));
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
