<?php

namespace App\Http\Controllers;

use App\Services\Supports\role_userService;
use App\Services\Supports\roleService;
use App\Services\Supports\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class role_userController extends Controller
{
    public function index(){
        $user = userService::all()->get();

        return view('role_user.index', compact('user'));
    }

    public function create($id){
        $user = userService::getUserById($id)->first();
        $role = roleService::all()->get();

        return view('role_user.create', compact('user', 'role'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $role_user = role_userService::joinRoleUser()->first();

        if(isset($_POST["save"])){
            try{
                $data = [
                    'user_id'=>$request->user_id,
                    'role_id'=>$request->role_id,
                    'user_type'=>'App\Models\User'
                ];

                $storeData = role_userService::store($data);

                DB::commit();

                return redirect()->route('role.index');

            }catch(\Throwable $th){

                return redirect()->route('role.index');

            }
        }elseif(isset($_POST["update"])){
            try{
                $data = [
                    'role_id'=>$request->role_id,
                ];

                $update = role_userService::update($data, $request->user_id);

                DB::commit();

                return redirect()->route('role.index');

            }catch(\Throwable $th){

                return redirect()->route('role.index');

            }
        }elseif(isset($_POST["delete"])){
            try{

                $data = [
                    'user_id'=>$role_user->user_id,
                    'role_id'=>$role_user->role_id,
                ];

                $delete = role_userService::delete($data, $request->user_id);

                DB::commit();

                return redirect()->route('role.index');

            }catch(\Throwable $th){

                return redirect()->route('role.index');

            }
        }
    }
}
