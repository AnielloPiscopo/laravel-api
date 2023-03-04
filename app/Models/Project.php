<?php

/*
|--------------------------------------------------------------------------
| Project Class
|--------------------------------------------------------------------------
|
| A class that represents a project istance
|
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = array('type_id','title' , 'slug' , 'description' , 'img_path');

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}