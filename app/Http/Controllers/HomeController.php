<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $counts = [
            'title' => 'Dashboard',
            'students' => Student::all()->count(),
            'parents' =>Parents::all()->count(),
            'courses' =>Course::all()->count(),
            'teachers' =>Teacher::all()->count()
        ];

        return view('home')->with($counts);
    }
}
