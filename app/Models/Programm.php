<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programm extends BaseModel
{
    use HasFactory;

    protected $fillable = array('name' , 'slug' , 'color' , 'bg-color');
}