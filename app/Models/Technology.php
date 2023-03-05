<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends BaseModel
{
    use HasFactory;

    protected $fillable = array('name' , 'slug' , 'color' , 'bg-color');

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}