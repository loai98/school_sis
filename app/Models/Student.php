<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsToMany(Course::class, 'student_cours','student_id','course_id')->as("Student_courses");
    }
}
