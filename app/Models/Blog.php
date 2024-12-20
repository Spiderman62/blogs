<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'name',
        'content',
        'image',
        'categories_id',
    ];
}
