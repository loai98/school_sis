<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Student extends Authenticatable
{

    use HasFactory;

    use Notifiable;

    protected $guard = 'students';

    protected $fillable = [
        'first_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function course(){
        return $this->belongsToMany(Course::class, 'student_cours','student_id','course_id')->as("Student_courses");
    }
    public function parents(){
        return $this->belongsTo(Parents::class);
    }
}
