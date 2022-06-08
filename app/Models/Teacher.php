<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Teacher extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'first_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];



    public function courses(){
        return $this->hasMany(Course::class);
    }
}
