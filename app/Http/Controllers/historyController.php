<?php

namespace App\Http\Controllers;

use App\Services\Supports\cctv_finishService;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index(){
        $data = cctv_finishService::all()->get();

        return view('history.index', compact('data'));
    }


}
