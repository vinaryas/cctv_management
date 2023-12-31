<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RoleUser extends Model
{
    use HasCompositePrimaryKeyTrait;

    protected $table = 'role_user';
    protected $guarded = [];
	protected $primaryKey = ['role_id','user_id'];
	public $incrementing = false;

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    const UPDATED_AT = null;
}
