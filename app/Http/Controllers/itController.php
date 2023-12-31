<?php

namespace App\Http\Controllers;

use App\Models\cctv_finish;
use App\Services\Supports\cctv_finishService;
use App\Services\Supports\formService;
use App\Services\Supports\videoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

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
                'created_name'=>$request->name,
                'approved_by'=>Auth::user()->id,
                'approved_name'=>Auth::user()->name,
                'status' => 'Finish',
                'video' => $request->video,
                'path' =>  'xampp/htdocs/cctv/storage/app/cctv_video/',
            ];

            $data['uuid'] = (string)Uuid::generate();
            if ($request->hasFile('video')) {
                $data['video'] = $request->video->getClientOriginalName();
                $request->video->storeAs('cctv_video', $data['video']);
            }

            $storeData = cctv_finishService::store($data);

            $dataUpdate = [
                'role_last_app' => Auth::user()->id,
                'role_next_app' => $nextApp,
                'status'=>2
            ];

            $updateStatus = formService::update($dataUpdate, $request->form_id);

            DB::commit();

            return redirect()->route('it.index');
        }catch(\Throwable $th){
            dd($th->getMessage());
            return redirect()->route('it.index');
        }

    }
}
