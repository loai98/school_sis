<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $teachers = Teacher::select('id', 'first_name', 'last_name')->get();
        $teachers = [
            'teachers' => $teachers,
            'title' => "Teachers",
        ];

        return view('teacher.teachers')->with($teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $course = Course::select('id', 'name')->get();
        $data = [
            'title' => ' Add Teacher',
            'courses' => $course,
        ];
        return view('teacher.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'unique:teachers',
        ]);

        $teacher = new Teacher();
        $teacher->first_name = $request->input('f_name');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->salary = $request->input('salary');
        $teacher->birth_date = $request->input('birth_date');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->last_name = $request->input('l_name');

        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $teacher->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }

        $teacher->save();
        //$courses = Course::find($request->input('courses'));
        $teacher->courses()->attach($request->input('courses'));
        // $teacher->courses()->atta

        return redirect('/teachers')->with('success', 'Teacher created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $teacher = Teacher::find($id);
        $teacher->course;
        return $teacher;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $teacher = Teacher::find($id);
        $teacher_courses =  DB::table('teacher_courses')->select('course_id')->where('teacher_id', $id)->groupBy('course_id')->get();

        $teacher_courses = $teacher_courses->pluck('course_id')->all();


        $data =[
            'title' =>'Edit'.$teacher->title,
            'teacher' =>$teacher,
            'courses'=>Course::select('id','name')->get(),
            'teacher_courses'=>$teacher_courses
        ];
        return view('teacher.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $teacher = Teacher::find($id);
        $teacher->first_name = $request->input('f_name');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->salary = $request->input('salary');
        $teacher->birth_date = $request->input('birth_date');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->last_name = $request->input('l_name');

        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $teacher->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }

        $teacher->save();
        $teacher->courses()->sync($request->input('courses'));
        return redirect('/teachers')->with('success', 'Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Teacher::find($id)->delete();

       return redirect('/teachers')->with('delete', 'Teacher Deleted');
    }
}
