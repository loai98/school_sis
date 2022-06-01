<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    public function parents(){
        $this->belongsTo(Parents::class);
    }
    public function course(){
        $this->belongsToMany(Course::class);
    }
}
