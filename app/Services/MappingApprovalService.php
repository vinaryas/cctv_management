<?php

namespace App\Services;

use App\Models\MappingApproval;

class MappingApprovalService
{
    private $mappingApproval;

    public function __construct(mappingApproval $mappingApproval)
    {
        $this->mappingApproval = $mappingApproval;
    }

    //note: bikin departemen id untuk mapping sesuai departemen
    public function getByTypeRoleId($roleId)
    {
        return $this->mappingApproval
                    ->where('role_id', $roleId);
                    // ->where('departemen_id', $departemenId);
    }

    public function getByPosition($position)
    {

        return $this->mappingApproval
                    ->where('position', $position);
                    // ->where('departemen_id', $departemenId);
    }
}
