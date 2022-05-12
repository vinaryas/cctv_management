<?php

namespace App\Services;

use App\Models\form;
use App\Services\Supports\MappingApprovalService;

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

    public function getNextApp($lastRole)
    {
        $thisPosition = MappingApprovalService::getByBapTypeRoleId($lastRole)->first()->position;

        $nextPosition = MappingApprovalService::getByPosition($thisPosition + 1)->first();

        return ($nextPosition != null) ? $nextPosition->role_id : 0;
    }

}
