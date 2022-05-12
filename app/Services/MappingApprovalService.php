<?php

namespace App\Services;

use App\Models\MappingApproval;

class MappingApprovalService
{
    private $mappingApproval;

    public function __construct(MappingApproval $mappingApproval)
    {
        $this->mappingApproval = $mappingApproval;
    }

    public function getByBapTypeRoleId($roleId)
    {
        return $this->mappingApproval->where('role_id', $roleId);
    }

    public function getByPosition($position)
    {
        return $this->mappingApproval->where('position', $position);
    }
}
