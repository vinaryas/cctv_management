<?php

namespace App\Services;

use App\Models\stores;

class storeService
{
   private $stores;

   public function __construct(stores $stores)
    {
        $this->stores = $stores;
    }

   public function all()
	{
		return $this->stores->query();
	}

}
