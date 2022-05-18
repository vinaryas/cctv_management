<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class backOffice extends Model
{
    use HasFactory;
    protected $table = 'back_office';
    protected $guarded = ['back_office'];
}
