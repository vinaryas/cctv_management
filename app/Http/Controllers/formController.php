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
        $user = userService::getUserById(Auth::User()->id)->first();
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

        DB::beginTransaction();
        $user = userService::getUserById(auth::user()->role_id)->first();

        try{
            $index = 0;
            $form = [
                'user_id'=>Auth::user()->id,
                'name'=>$request->name,
                'nik'=>$request->nik,
                'region_id'=>$request->region_id,
                'departemen_id'=>$request->departemen_id,
            ];

            $storeForm = formService::store($form);

            foreach ($request->place_id as $place_id) {

                $area = ($place_id >= 1 and $place_id <= 2) ? $request->area_id[$index] : null;

                $data = [
                    'form_id' => $storeForm->id,
                    'place_id'=>$request->place_id,
                    'area_id'=>$area,
                    'tempat_cctv'=>$request->tempat_cctv,
                    'description'=>$request->description,
                    'role_last_app' => Auth::user()->roles->first()->id,
                    'role_next_app'=>formService::getNextApp( Auth::user()->roles->first()->id),
                    'status'=>0,
                    'created_by'=>Auth::user()->id,
                ];

                dd($data);
                $storeData = form_placeService::store($data);

                $index++;
            }
            DB::commit();

            return redirect()->route('form.index');

        }catch(\Throwable $th){
            dd($th);

            return redirect()->route('form.view');
        }
    }
}
