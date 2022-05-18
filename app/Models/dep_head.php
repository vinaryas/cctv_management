<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dep_head extends Model
{
    use HasFactory;
    protected $table = 'dep_head';
    protected $guarded = ['dep_head'];

    public function departemens()
    {
        return $this->hasOne(departemens::class, 'id', 'departemen_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
