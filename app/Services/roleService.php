<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
   private $Role;

   public function __construct(Role $Role)
    {
        $this->Role = $Role;
    }

   public function all()
	{
		return $this->Role->query();
	}

}
