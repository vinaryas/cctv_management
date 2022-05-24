<?php

namespace App\Http\Controllers;

use App\Services\Supports\dep_headService;
use App\Services\Supports\departemenService;
use App\Services\Supports\role_userService;
use App\Services\Supports\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dep_headController extends Controller
{
    public function index(){
        $user = role_userService::getDepHead()->get();

        return view('dep_head.index', compact('user'));
    }

    public function create($id){
        $user = userService::getUserById($id)->first();
        $departemen = departemenService::all()->get();

        return view('dep_head.create', compact('user', 'departemen'));
    }

    public function store(Request $request){
        DB::beginTransaction();

        if(isset($_POST["store"])){
            try{
                $data =[
                    'departemen_id' =>$request->departemen_id,
                    'user_id' =>$request->user_id,
                ];
                $saveData = dep_headService::store($data, $request->user_id);

                DB::commit();

                return redirect()->route('dep_head.index');
            }catch(\Throwable $th){
                dd($th);
                return redirect()->route('dep_head.index');
            }
        }elseif(isset($_POST["delete"])){
            try{
                $deleteData = dep_headService::delete($request->user_id);

                DB::commit();

                return redirect()->route('dep_head.index');
            }catch(\Throwable $th){
                dd($th);
                return redirect()->route('dep_head.index');
            }
        }

    }

}
