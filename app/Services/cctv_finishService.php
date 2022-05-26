<?php

namespace App\Services;

use App\Models\cctv_finish;
use Illuminate\Support\Facades\DB;

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

    public function getUUID($uuid)
    {
        return $this->cctvFinish->where('uuid', $uuid);
    }

}
