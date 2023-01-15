<?php

namespace App\Http\Controllers;

use App\Models\Logo;
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
            return redirect("/");
        }
    }

    public function logo_change()
    {
        if(Auth::user()->admin == 1) {
            return view('logoChange', ([
                'logo' => Logo::first()
            ]));
        } else {
            return redirect("/");
        }
    }

    public function chaningLogo(Request $request)
    {
        // storing image
        if($request->logo_image){
            $logo = Logo::first();
            unlink(public_path().('/').$logo->logo_image);

            $filename = time() . '_' . $request->file('logo_image')->getClientOriginalName();
            $file = $request->file('logo_image');
            $tmpFilePath = public_path().'/asset/images/';
            $file = $file->move($tmpFilePath, $filename);
            $image = 'asset/images/'.$filename;
        } elseif($request->image == null) {
            $image = $request->logo_image;
        }

        // dd($request->logo_word);
        if(Auth::user()->admin == 1) {

            Logo::updateorCreate([
                'id' => 1,
            ], [
                'logo_word' => $request->logo_word,
                'logo_image' => $image
            ]);

            return redirect()->back();

        } else {
            return redirect("/");
        }
    }

    public function logoSelection(Request $request)
    {
        if(Auth::user()->admin == 1) {
            $logo = Logo::first();

            Logo::updateorCreate([
                'id' => 1,
                'logo_word' => $logo->logo_word,
                'logo_image' => $logo->logo_image,
            ], [
                'selectedLogo' => $request->selectedLogo
            ]);

            return redirect()->back();
        } else {
            return redirect("/");
        }
    }
}
