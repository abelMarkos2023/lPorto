<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','image','url'];
    protected $with = ['techs'];

    public function techs(){
        return $this->belongsToMany(Technology::class,'project_technologies');
    }
    public function image_path(){
        return '/uploads/projects/'.$this->image;
    }
}
