<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Series;
use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::find(request('id'));
        $questions = Question::where('series_id', $test->series_id)->get();
        // dd($questions);
        if (count($questions) == $test->question_count) {
            return redirect(route('question.show', $questions[0]->id));
        }
        return redirect(route('question.show', $questions[$test->question_count]->id));
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
        $answer = $request->op1 ? $request->op1.',' : '';
        $answer .= $request->op2 ? $request->op2.',' : '';
        $answer .= $request->op3 ? $request->op3.',' : '';
        $answer .= $request->op4 ? $request->op4 : '';

        TestAnswer::updateOrCreate([
            'user_id' => auth()->user()->id,
            'series_id' => $request->series_id,
            'question_id' => $request->question_id,
        ], ['answer' => $answer]);
        if($request->next_page != 'no'){
            return redirect($request->next_page);
        }
        // Test::createOrUpdate([],[])
        return 'view';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $ser = Series::find($question->series_id);
        // dd($ser->questions()->paginate(1));
        return view('question', [
            'que' => $question,
            'ser_qu' => $ser
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
