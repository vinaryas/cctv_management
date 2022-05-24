<?php

namespace App\Services;

use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;

class role_userService
{
   private $RoleUser;

   public function __construct(RoleUser $RoleUser)
    {
        $this->RoleUser = $RoleUser;
    }

   public function all()
	{
		return $this->RoleUser->query();
	}

    public function store($data)
    {
        return $this->RoleUser->insert($data);
    }

    public function update($data, $userId)
    {
        return $this->RoleUser->where('user_id', $userId)->update($data);
    }

    public function delete($userId, $data)
    {
        return $this->RoleUser->where('user_id', $userId)->delete($data);
    }

    public function joinRoleUser()
    {
        $data = DB::table('role_user')
        ->join('users', 'role_user.user_id', '=', 'users.id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select(
            'users.id as user_id',
            'users.name as user_name',
            'roles.id as role_id',
            'roles.display_name as role_name'
        );

        return $data;
    }

    public function getDepHead()
    {
        return $this-> joinRoleUser()->where('role_id', 2);
    }

}
