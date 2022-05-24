<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function authDepArray()
    {
        $departemen = [];
        foreach (Auth::user()->departemens as $departemen) {
            $departemen[] = $departemen->id;
        }

        return $departemen;
    }
}
