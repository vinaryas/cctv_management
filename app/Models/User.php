<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nik',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopegetUserRole($query)
    {
        return $query->join('role_user', 'users.id', '=', 'role_user.user_id')
                     ->join('roles', 'role_user.role_id', '=', 'roles.id')
                     ->select('users.id', 'users.name', 'users.username', 'users.email', 'roles.name as rolename');
    }

    public function RoleUser()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->hasOne(Role::class,'id', 'role_id' );
    }

    public function departemens()
    {
        return $this->hasManyThrough('App\Models\departemens', 'App\Models\dep_head', 'user_id', 'id', 'id', 'departemen_id');
    }

    public function depHead()
    {
        return $this->hasOne(dep_head::class, 'user_id', 'id');
    }
}
