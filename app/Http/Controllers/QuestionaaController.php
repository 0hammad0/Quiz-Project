<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(){
        return view('index', compact('disco', 'classic'));
    }

    public function buffer_discovery($id){
        $rec = Question::where('series_id',$id)->first();

        if($rec)
        {
            if($rec->section == 1)
            {
                $s_id = $rec->series_id;
                $disc = Question::find($s_id);

                return view('buffer', compact('rec', 'disc'));
            }
        }
        else
        {
            $disc = Question::find($id);
            return view('buffer_be', compact('disc'));
        }
    }

    public function buffer_classic($id){
        $rec = Question::find($id);
        $s_id = $rec->series_id;
        $classic = Question::find($s_id);

        return $classic;
    }

    public function discovery_question($id){
        $dq = Question::where('series_id', $id)->paginate(1);
        //check if this question is answered or not
        dd($dq[0]);


        // $dq = DiscoveryQuestion::where('series_id', $id)->first();
        // return $dq->image_path;
        return view('question', compact('dq'));
    }

    // public function record(){

    // }
}
