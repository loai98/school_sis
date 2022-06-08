<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class StudentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $students = Student::select('id', 'first_name', 'last_name')->get();
        $students =[
            'students' => $students,
            'title' =>"Students"
        ];
        return view('student.students')->with($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // $student = new Student();
        // $student->first_name = "Test";
        // $student->last_name = "Test";
        // $student->image = "";
        // $student->address = "Test";
        // $student->birth_date=  Date("2022-06-02 21:34:06");
        // $student->save();

        // $course = Course::find([1,2]);
        // $student->course()->attach($course);

        return "Student Create";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $student = Student::find($id);
        $student->course;
        $student->parents;
        // $courses_names=[];
        // foreach($coursrs as $course){
        //     array_push($courses_names, $course->name);

        // }

        return $student;
        // return  $coursrs ;
        // return $courses_names;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
