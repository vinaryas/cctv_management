<?php

namespace App\Services;

use App\Models\cctv_finish;

class cctv_finishService
{
   private $cctvFinish;

   public function __construct(cctv_finish $cctvFinish)
    {
        $this->cctvFinish = $cctvFinish;
    }

   public function all()
	{
		return $this->cctvFinish->query();
	}

    public function store($data)
    {
        return $this->cctvFinish->create($data);
    }

}