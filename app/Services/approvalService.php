<?php

namespace App\Services;

use App\Models\approval;

class approvalService
{
    private $approval;

    public function __construct(approval $approval)
    {
        $this->approval=$approval;
    }

    public function all()
    {
        return $this->approval->query();
    }

    public function store($data)
    {
        return $this->approval->create($data);
    }


}
