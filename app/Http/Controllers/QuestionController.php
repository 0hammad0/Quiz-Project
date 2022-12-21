<?php

namespace App\Http\Controllers;

use App\Models\ClassicSeries;
use App\Models\DiscoverySeries;
use App\Models\Question;
use App\Models\Record;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $disco = DiscoverySeries::all();
        $classic = ClassicSeries::all();
        return view('index', compact('disco', 'classic'));
    }

    public function buffer($id){
        $rec = Record::findOrFail($id);
        return view('buffer', compact('rec'));
    }
}
