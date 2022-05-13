<?php

namespace App\Services;

use App\Models\form;
use App\Services\Supports\MappingApprovalService;
use Illuminate\Support\Facades\DB;

class formService
{
   private $form;

   public function __construct(form $form)
    {
        $this->form = $form;
    }

   public function all()
	{
		return $this->form->query();
	}

    public function store($data)
    {
        return $this->form->create($data);
    }

    //note isi departemen id untuk next approval sesuai departemen
    public function getNextApp($roleId)
    {
        $thisPosition = MappingApprovalService::getByTypeRoleId($roleId)->first()->position;

        $nextPosition = MappingApprovalService::getByPosition($thisPosition + 1)->first();

        return ($nextPosition != null) ? $nextPosition->role_id : 0;
    }

    public function getDetail()
    {
        $data = DB::table('form')
        ->join('users', 'form.created_by', '=', 'users.id')
        ->join('regions', 'form.region_id', '=', 'regions.id')
        ->join('departemens', 'form.departemen_id', '=', 'departemens.id')
        ->join('place', 'form.place_id', '=', 'place.id')
        // ->join('stores', 'form.area_id', '=', 'stores.id')
        // ->join('area_kantor', 'form.area_id', '=', 'area_kantor.id')
        ->select(
            'form.id as form_id',
            'form.name as name',
            'form.nik as nik',
            'form.tempat_cctv as tempat_cctv',
            'form.description as description',
            'form.area_id as area_id',
            'form.date as date',
            'form.time_first as time_first',
            'form.time_last as time_last',
            'form.created_by as created_by',
            'departemens.id as departemen_id',
            'departemens.name as departemens_name',
            'place.place as place',
            'place.id as place_id',
            'regions.id as region_id',
            'regions.name as regions_name'
        );

        return $data;
    }

    public function getFormById($formId)
    {
        return $this->getDetail()->where('form.id', $formId);
    }

    public function update($data, $formId)
    {
        return $this->getDetail()->where('form.id', $formId)->update($data);
    }
}
