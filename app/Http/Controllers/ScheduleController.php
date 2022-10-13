<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drop;
use Barryvdh\DomPDF\Facade\Pdf;

class ScheduleController extends Controller
{
    public function index()
    {
        $drops = Drop::where('is_active', true)->get();
        return view('schedule', compact('drops'));
    }

    public function getHours(Request $request)
    {
        $drop = Drop::find($request->drop_id);

        if(empty($drop))
        {
            return response()->json("Drop not found", 403);
        }
        else
        {
            return response()->json(['data' => $drop], 200);
        }
    }

    public function generatePDF(Request $request)
    {
        $data = [];

        for($i = 2; $i <= 24; $i += 2)
        {
            $data[$i] = [];
        }
        

        foreach($request->drops as $drop)
        {
            foreach($drop['hours'] as $hour)
            {
                $data[$hour][] = [
                    'image' => $drop['image'],
                    'name' => $drop['name'],
                    'eyeType' => $drop['is_left'] == true ? "Left Eye" : ($drop['is_right'] == true ? "Right Eye" : ($drop['is_right'] == true && $drop['is_left'] == true ? "Both Eyes" : "None")),
                ];
            }
        }

        $data = ['data' => $data];

        $path =  '/prints/print_' . date("d-m-Y-h-m-s") . '.pdf';

        Pdf::loadView('imageLayout', $data)->save(public_path() . $path);
        return response()->json(['url' => $path]);
    }
}
