<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
public function image_path(){
    return '/uploads/tech/'.$this->image;
}

public function projects(){
    return $this->belongsToMany(Project::class,'project_technologies');
}
}
