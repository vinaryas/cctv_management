<?php

namespace App\Services;

use App\Models\areaKantor;

class areaKantorService
{
   private $areaKantor;

   public function __construct(areaKantor $areaKantor)
    {
        $this->areaKantor = $areaKantor;
    }

   public function all()
	{
		return $this->areaKantor->query();
	}

}
