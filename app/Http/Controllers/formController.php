<?php

namespace App\Http\Controllers;

use App\Models\store;
use App\Services\Supports\areaKantorService;
use App\Services\Supports\departemenService;
use App\Services\Supports\form_placeService;
use App\Services\Supports\formService;
use App\Services\Supports\placeService;
use App\Services\Supports\regionService;
use App\Services\Supports\storeService;
use App\Services\Supports\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class formController extends Controller
{
    public function index(){
        $place = placeService::all()->get();

        return view('form.index', compact('place'));
    }

    public function create($id){
        $user = userService::getUserById(Auth::User()->id)->first();
        $place = placeService::getPlaceId($id)->first();
        $region = regionService::all()->get();
        $departemen = departemenService::all()->get();
        $store = storeService::all()->get();
        $areaKantor = areaKantorService::all()->get();

        return view('form.create',
        compact(
            'user',
            'place',
            'region',
            'departemen',
            'store',
            'areaKantor',
        ));
    }

    public function store(Request $request){

        DB::beginTransaction();

        try{
            $form = [
                'created_by'=>Auth::user()->id,
                'name'=>$request->name,
                'nik'=>$request->nik,
                'region_id'=>$request->region_id,
                'departemen_id'=>$request->departemen_id,
                'place_id'=>$request->place_id,
                'area_id'=>$request->area_id,
                'date'=>$request->date,
                'time_first'=>$request->time_first,
                'time_last'=>$request->time_last,
                'tempat_cctv'=>$request->tempat_cctv,
                'description'=>$request->description,
                'role_last_app' => Auth::user()->roles->first()->id,
                'role_next_app'=>formService::getNextApp(Auth::user()->roles->first()->id),
                'status'=>0,
            ];

            $storeForm = formService::store($form);

            DB::commit();

            return redirect()->route('form.index');

        }catch(\Throwable $th){
            dd($th);

            return redirect()->route('form.index');
        }
    }
}
