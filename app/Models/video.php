<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $guarded = ['video'];
    protected $fillable = ['file_name'];
}
