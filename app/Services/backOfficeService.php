<?php

namespace App\Services;

use App\Models\backOffice;

class backOfficeService
{
   private $backOffice;

   public function __construct(backOffice $backOffice)
    {
        $this->backOffice = $backOffice;
    }

   public function all()
	{
		return $this->backOffice->query();
	}

}
