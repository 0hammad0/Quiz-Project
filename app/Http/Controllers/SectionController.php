<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\SeriesType;

class SectionController extends Controller
{
    public function code_le_la_route($id)
    {
        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id)
        ]);
    }

    public function permis_de_Conduir_B($id)
    {
        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id)
        ]);
    }

    public function formation_VTC($id)
    {
        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id)
        ]);
    }

    public function formation_TAXI($id)
    {
        return view('Home.seriesMenu', [
            'seriesType' => SeriesType::all(),
            'seriesTypeID' => SeriesType::findOrFail($id)
        ]);
    }

    public function series_id_redirect($id)
    {
        $seriesType = SeriesType::findOrFail($id);

        return view('index', [
            'seriesType' => SeriesType::all(),
            'classic' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'simple')->where('belongs', 'classic')->get(),
            'disco' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'simple')->where('belongs', 'discovery')->get(),
            'Examens' => null
        ]);
    }

    public function series_id_redirect_examens($id)
    {
        $seriesType = SeriesType::findOrFail($id);

        return view('index', [
            'seriesType' => SeriesType::all(),
            'Examens' => Series::where('series_type', $seriesType->seriestype)->where('section_type', 'Examens')->get(),
        ]);
    }
}
