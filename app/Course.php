<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function student(){
        $this->belongsToMany(Students::class);
    }
    public function taecher(){
        $this->belongsTo(Teacher::class);
    }
}
