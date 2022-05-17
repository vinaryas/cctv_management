<?php

namespace App\Http\Controllers;

use App\Models\cctv_finish;
use App\Services\Supports\cctv_finishService;
use App\Services\Supports\formService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class itController extends Controller
{
    public function index(){
        $form = formService::getApprovalForIt()->get();

        return view('it.index', compact('form'));
    }

    public function create($formId){
        $form = formService::getFormById($formId)->first();

        return view('it.create', compact('form'));
    }

    public function store(Request $request){

        DB::beginTransaction();
        $nextApp = formService::getNextApp(Auth::user()->roles->first()->id);

        try{
            $data = [
                'form_id' => $request->form_id,
                'created_by' => $request->created_by,
                'approved_by'=>Auth::user()->id,
                'status' => 'Finish'
            ];

            $storeApprove = cctv_finishService::store($data);

            $dataUpdate = [
                'role_last_app' => Auth::user()->id,
                'role_next_app' => $nextApp,
                'status'=>2
            ];

            $updateStatus = formService::update($dataUpdate, $request->form_id);

            DB::commit();

            return redirect()->route('it.index');
        }catch(\Throwable $th){
            return redirect()->route('it.index');
        }

    }
}
