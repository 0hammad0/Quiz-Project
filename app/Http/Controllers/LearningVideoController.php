<?php

namespace App\Http\Controllers;

use App\Models\LearningVideo;
use App\Models\Series;
use App\Models\SeriesType;
use Illuminate\Http\Request;

class LearningVideoController extends Controller
{
    public function index($id)
    {
        $series = SeriesType::findOrFail($id);

        return view('Home.learningVideos', ([
            'videos' => LearningVideo::where('series_type_id', $series->id)->get()
        ]));
    }

    public function menu()
    {
        return view('learningVideo.learningVideoManu', ([
            'series' => SeriesType::all(),
        ]));
    }

    public function learningVideos_show($id)
    {
        $series = SeriesType::findOrFail($id);
        return view('learningVideo.learningVideoShow', ([
            'videos' => LearningVideo::where('series_type_id', $series->id)->get(),
            'series' => $series
        ]));
    }

    public function learningVideos_create($id)
    {
        $series = SeriesType::findOrFail($id);
        return view('learningVideo.learningVideoCreate', ([
            'series' => $series
        ]));
    }

    public function learningVideos_store(Request $request)
    {
        $LearningVideo = LearningVideo::create([
            'videoLink' => $request->video_link,
            'series_type_id' => $request->seriesId
        ]);

        if($LearningVideo)
            return redirect()->back()->with('success', 'successfully added');
        else
            return redirect()->back()->with('failed', 'failed to add');
    }

    public function learningVideos_delete($id)
    {
        $LearningVideo = LearningVideo::findOrFail($id);
        $LearningVideo->delete();

        if($LearningVideo)
            return redirect()->back()->with('success', 'successfully added');
        else
            return redirect()->back()->with('failed', 'failed to add');
    }
}
