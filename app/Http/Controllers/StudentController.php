<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Parents;
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
        $students = [
            'students' => $students,
            'title' => "Students",
        ];
        return view('student.students')->with($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $parents = Parents::all();
        $courses = Course::all();
        $data = [
            'title' => 'Add new Student',
            'parents' => $parents,
            'courses' => $courses,
        ];
        return view('student.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request,
            ['email' => 'unique:students|required',
                'f_name' => 'required',
                'image' => 'image|nullable']
        );
        $student = new Student();
        $student->first_name = $request->input('f_name');
        $student->last_name = $request->input('l_name');
        $student->age = $request->input('age');
        $student->address = $request->input('address');
        $student->email = $request->input('email');
        $student->parents_id = $request->input('parent');
        $student->birth_date = $request->input('birth_date');

        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $student->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }
        $student->save();
        $student->course()->sync($request->input('courses'));

        return redirect('/students'.'/'.$student->id)->with('success', "Student" . $request->input('f_name') . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $student = Student::find($id);
        $data = [
            'title'=>$student->first_name,
            'student'=>$student
        ];
        return view('student.landing')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $student = Student::find($id);
        $student_courses = $student->course;
        $data = [
            'titile' => 'Edit ' . $student->first_name,
            'student' => $student,
            'parents' => Parents::all(),
            'courses' => Course::all(),
            'student_courses' => $student_courses->pluck('id')->all(),

        ];
        return view('student.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $student = Student::find($id);
        if ($student->email != $request->input('email')) {
            $this->validate($request,
                ['email' => 'unique:students|required']);
        }
        $this->validate($request,
            [
                'f_name' => 'required',
                'image' => 'image|nullable']
        );
        $student->first_name = $request->input('f_name');
        $student->last_name = $request->input('l_name');
        $student->age = $request->input('age');
        $student->address = $request->input('address');
        $student->email = $request->input('email');
        $student->parents_id = $request->input('parent');
        $student->birth_date = $request->input('birth_date');

        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $student->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }
        $student->save();
        $student->course()->sync($request->input('courses'));

        return redirect('/students'.'/'.$student->id)->with('success', "Student " . $request->input('f_name') . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $student =Student::find($id);
        $student->delete();
        return redirect('/students')->with('delete',$student->first_name." was deleted");
    }

}
