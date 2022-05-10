<?php

namespace App\Services;

use App\Models\place;

class placeService
{
   private $place;

   public function __construct(place $place)
    {
        $this->place = $place;
    }

   public function all()
	{
		return $this->place->query();
	}

}
