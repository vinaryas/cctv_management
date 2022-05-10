<?php

namespace App\Services;

use App\Models\regions;

class regionService
{
   private $regions;

   public function __construct(regions $regions)
    {
        $this->regions = $regions;
    }

   public function all()
	{
		return $this->regions->query();
	}

}
