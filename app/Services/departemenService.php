<?php

namespace App\Services;

use App\Models\departemens;

class departemenService
{
   private $departemens;

   public function __construct(departemens $departemens)
    {
        $this->departemens = $departemens;
    }

   public function all()
	{
		return $this->departemens->query();
	}

}
