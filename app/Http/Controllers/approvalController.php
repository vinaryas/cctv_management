<?php

namespace App\Http\Controllers;

use App\Services\Supports\approvalService;
use App\Services\Supports\formService;
use App\Services\Supports\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class approvalController extends Controller
{
    public function index(){
        if(Auth::user()->roles->first()->id == '1'){
            $form = formService::getApproveFilterByDepartemen(Auth::user()->roles->first()->id,  UserService::authDepArray())->get();
        }else{
            $form = formService::getApproval(Auth::user()->roles->first()->id)->get();
        }

        return view('approval.index', compact('form'));
    }

    public function create($formId){
        $form = formService::getFormById($formId)->first();

        return view('approval.create', compact('form'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $nextApp = formService::getNextApp(Auth::user()->roles->first()->id);

        if (isset($_POST["approve"])){
            try{
                $data = [
                    'form_id' => $request->form_id,
                    'created_by' => $request->created_by,
                    'approved_by'=>Auth::user()->id,
                    'status' => 'Approved'
                ];

                $storeApprove = approvalService::store($data);

                $dataUpdate = [
                    'role_last_app' => Auth::user()->id,
                    'role_next_app' => $nextApp,
                ];

                $updateStatus = formService::update($dataUpdate, $request->form_id);

                DB::commit();

                return redirect()->route('approval.index');
            }catch(\Throwable $th){
                return redirect()->route('approval.index');
            }
        } elseif (isset($_POST["disapprove"])){
            try{
                $data = [
                    'form_id' => $request->form_id,
                    'created_by' => $request->created_by,
                    'approved_by'=>Auth::user()->id,
                    'status' => 'Disapprove'
                ];

                $storeApprove = approvalService::store($data);

                $dataUpdate = [
                    'role_last_app' => Auth::user()->id,
                    'role_next_app' => $nextApp,
                    'status'=>1
                ];

                $updateStatus = formService::update($dataUpdate, $storeApprove->form_id);

                DB::commit();

                return redirect()->route('approval.index');
            }catch(\Throwable $th){
                return redirect()->route('approval.index');
            }
        }
    }
}
