<?php

namespace App\Services;

use App\Models\User;

class userService
{
   private $User;

   public function __construct(User $User)
    {
        $this->User = $User;
    }

   public function all()
	{
		return $this->User->query();
	}

    public function getUserById($id)
    {
        return $this->User->where('id', $id);
    }
}
