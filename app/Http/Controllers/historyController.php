<?php

namespace App\Http\Controllers;

use App\Services\Supports\cctv_finishService;

class historyController extends Controller
{
    public function index(){
        $data = cctv_finishService::all()->get();

        return view('history.index', compact('data'));
    }

    public function download($uuid)
    {
        $video = cctv_finishService::getUUID($uuid)->firstOrFail();
        $pathToFile = storage_path('app\cctv_video\\'. $video->video);
        return response()->download($pathToFile);
    }
}
