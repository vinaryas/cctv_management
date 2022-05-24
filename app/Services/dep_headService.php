<?php

namespace App\Services;

use App\Models\dep_head;
use Illuminate\Support\Facades\DB;

class dep_headService
{
    private $dep_head;

    public function __construct(dep_head $dep_head)
    {
        $this->dep_head = $dep_head;
    }

    public function all()
	{
		return $this->dep_head->query()->with('dapartemens');
	}

    public function store($data)
    {
        return $this->dep_head->create($data);
    }

	public function update($data, $id)
	{
		return $this->dep_head->where('id', $id)->update($data);
	}

    public function delete($data)
    {
    	return $this->dep_head->where('id', $data['id'])->delete();
    }

    public function joinRoleDephead()
    {
        $data = DB::table('dep_head')
        ->join('users', 'dep_head.user_id', '=', 'users.id')
        ->join('departemens', 'dep_head.departemen_id', '=', 'departemens.id')
        ->select(
            'dep_head.id as dep_head_id',
            'users.id as user_id',
            'users.name as user_name',
            'departemens.id as departemen_id',
            'departemens.name as departemen_name',
        );

        return $data;
    }
}
