<?php

namespace App\Http\Controllers;

use App\Models\FinalResult;
use App\Models\Series;
use App\Models\Question;
use App\Models\TestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateQuestionController extends Controller
{
    public function create_question(Request $request)
    {
        if(Auth::user()->admin == 1) {

            // storing image
            if($request->image){
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $file = $request->file('image');
                $tmpFilePath = public_path().'/asset/images/';
                $file = $file->move($tmpFilePath, $filename);
                $image = 'asset/images/'.$filename;
            } else {
                $image = "";
            }

            // storing audio
            if($request->audio){

                $filename = time() . '_' . $request->file('audio')->getClientOriginalName();
                $file = $request->file('audio');
                $tmpFilePath = public_path().'/asset/audio/';
                $file = $file->move($tmpFilePath, $filename);
                $audio = 'asset/audio/'.$filename;
            } else {
                $audio = "";
            }

            // storing Qestion video
            if($request->video){

                $filename = time() . '_' . $request->file('video')->getClientOriginalName();
                $file = $request->file('video');
                $tmpFilePath = public_path().'/asset/video/';
                $file = $file->move($tmpFilePath, $filename);
                $video = 'asset/video/'.$filename;
            } else {
                $video = "";
            }

            // storing Answer video
            if($request->ans_video){

                $filename = time() . '_' . $request->file('ans_video')->getClientOriginalName();
                $file = $request->file('ans_video');
                $tmpFilePath = public_path().'/asset/video/';
                $file = $file->move($tmpFilePath, $filename);
                $ans_video = 'asset/video/'.$filename;
            } else {
                $ans_video = "";
            }

            $ques = new Question;

            $ques->series_id = $request->series_id;
            $ques->question_type = $request->series_type;
            $ques->question = $request->question;
            $ques->description = $request->correction;
            $ques->option1 = $request->option_A;
            $ques->option2 = $request->option_B;

            if($request->option_C)
                $ques->option3 = $request->option_C;
            else
                $ques->option3 = "";
            if($request->option_D)
            $ques->option4 = $request->option_D;
            else
                $ques->option4 = "";

            $ques->answer = strtoupper($request->answer);
            $ques->question_category = $request->theme;

            $ques->audio_path = $audio;
            $ques->video_path = $video;
            $ques->file_path = $image;
            $ques->ans_video_path = $ans_video;

            $ques->save();
            return redirect(route('adminpanel.index'));

        } else {
            return redirect(route("/"));
        }
    }

    public function update_question(Request $request)
    {
        if(Auth::user()->admin == 1) {
            $ques = Question::find($request->id);
            // dd($ques->question_type);

            // storing image
            if($request->image){
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $file = $request->file('image');
                $tmpFilePath = public_path().'/asset/images/';
                $file = $file->move($tmpFilePath, $filename);
                $image = 'asset/images/'.$filename;
            } elseif($request->image == null) {
                $image = $request->image;
            }

            // storing audio
            if($request->audio){

                $filename = time() . '_' . $request->file('audio')->getClientOriginalName();
                $file = $request->file('audio');
                $tmpFilePath = public_path().'/asset/audio/';
                $file = $file->move($tmpFilePath, $filename);
                $audio = 'asset/audio/'.$filename;
            } elseif($request->audio == null) {
                $audio = $request->audio;
            }

            // storing video
            if($request->video){

                $filename = time() . '_' . $request->file('video')->getClientOriginalName();
                $file = $request->file('video');
                $tmpFilePath = public_path().'/asset/video/';
                $file = $file->move($tmpFilePath, $filename);
                $video = 'asset/video/'.$filename;
            } elseif($request->video == null) {
                $video = $request->video;
            }

            // storing Answer video
            if($request->ans_video){

                $filename = time() . '_' . $request->file('ans_video')->getClientOriginalName();
                $file = $request->file('ans_video');
                $tmpFilePath = public_path().'/asset/video/';
                $file = $file->move($tmpFilePath, $filename);
                $ans_video = 'asset/video/'.$filename;
            } else {
                $ans_video = "";
            }

            Question::updateOrCreate([
                'series_id' => $request->series_id,
                'question_type' => $request->question_type,
                'question' => $request->question,
                'description' => $request->correction,
                'option1' => $request->option_A,
                'option2' => $request->option_B,
                'option3' => $request->option_C,
                'option4' => $request->option_D,
                'answer' => $request->answer,
                'question_category' => $request->theme,
            ], [
                'audio_path' => $audio,
                'video_path' => $video,
                'file_path' => $image,
                'ans_video_path' => $ans_video]);
            return redirect(route('adminpanel.index'));

        } else {
            return redirect(route("/"));
        }
    }

    public function delete_ser($id)
    {
        $ser = Series::findOrFail($id);
        $ques = Question::where('series_id', $ser->id);
        $ques->delete();
        $ser->delete();
        return redirect(route('adminpanel.index'));
    }

    public function ques_delete($id)
    {
        $ques = Question::findOrFail($id);
        $final_result = FinalResult::where('question_id', $ques->id);
        $test_answer = TestAnswer::where('question_id', $ques->id);

        $final_result->delete();
        $test_answer->delete();
        $ques->delete();
        if($ques)
        {
            return redirect()->back();
        }
        else {
            return redirect(route('/'));
        }
    }
}
