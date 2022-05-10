<?php

namespace App\Http\Controllers;

use App\Models\store;
use App\Services\Supports\areaKantorService;
use App\Services\Supports\departemenService;
use App\Services\Supports\formService;
use App\Services\Supports\placeService;
use App\Services\Supports\regionService;
use App\Services\Supports\storeService;
use App\Services\Supports\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formController extends Controller
{
    public function index(){
        $user = userService::getAuthUserId(Auth::User()->id)->first();
        $region = regionService::all()->get();
        $departemen = departemenService::all()->get();
        $place = placeService::all()->get();
        $store = storeService::all()->get();
        $areaKantor = areaKantorService::all()->get();

        // dd($user, $region, $departemen);

        return view('form.index',
        compact(
            'user',
            'region',
            'departemen',
            'place',
            'store',
            'areaKantor',
        ));
    }

    public function store(Request $request){
        $data = [
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'nik'=>$request->nik,
            'region_id'=>$request->region_id,
            'departemen_id'=>$request->departemen_id,
            'description'=>$request->description,
        ];

        $storeData = formService::store($data);

        return redirect()->route('form.index');
    }
}
