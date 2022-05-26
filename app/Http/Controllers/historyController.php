<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\cctv_finish;
use App\Services\Supports\cctv_finishService;
use App\Services\Supports\videoService;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index(){
        $data = cctv_finishService::all()->get();
        $books = books::all();

        return view('history.index', compact('data', 'books'));
    }

    public function download($uuid)
    {
        $video = cctv_finishService::getUUID($uuid)->firstOrFail();
        $pathToFile = storage_path('app\cctv_video\\'. $video->video);
        return response()->download($pathToFile);
    }
}
