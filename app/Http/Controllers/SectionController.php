<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Mistake;
use App\Models\SeriesType;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function code_le_la_route($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id),
            'mistakes' => count($mistakes)
        ]);
    }

    public function permis_de_Conduir_B($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id),
            'mistakes' => count($mistakes)
        ]);
    }

    public function formation_VTC($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id),
            'mistakes' => count($mistakes)
        ]);
    }

    public function formation_TAXI($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id),
            'mistakes' => count($mistakes)
        ]);
    }

    public function series_id_redirect($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        $seriesType = SeriesType::findOrFail($id);

        return view('index', [
            'seriesType' => SeriesType::all(),
            'classic' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'simple')->where('belongs', 'classic')->get(),
            'disco' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'simple')->where('belongs', 'discovery')->get(),
            'Examens' => null,
            'mistakes' => count($mistakes)
        ]);
    }

    public function series_id_redirect_examens($id)
    {
        $mistakes = Mistake::where('user_id', Auth::id())
        ->where('seriesType_id', $id)
        ->where('result', 'F')
        ->get();

        $seriesType = SeriesType::findOrFail($id);

        return view('index', [
            'seriesType' => SeriesType::all(),
            'Examens' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'Examens')->get(),
            'mistakes' => count($mistakes)
        ]);
    }
}
