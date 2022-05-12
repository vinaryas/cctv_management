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

    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $keys = $this->getKeyName();
    //     if(!is_array($keys)){
    //         return parent::setKeysForSaveQuery($query);
    //     }

    //     foreach($keys as $keyName){
    //         $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
    //     }

    //     return $query;
    // }

    // protected function getKeyForSaveQuery($keyName = null)
    // {
    //     if(is_null($keyName)){
    //         $keyName = $this->getKeyName();
    //     }

    //     if (isset($this->original[$keyName])) {
    //         return $this->original[$keyName];
    //     }

    //     return $this->getAttribute($keyName);
    // }

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
