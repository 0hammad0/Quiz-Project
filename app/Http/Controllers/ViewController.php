<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
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
            return redirect(route("/"));
        }
    }
}
