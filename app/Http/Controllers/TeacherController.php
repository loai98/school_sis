<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::select('id','first_name','last_name')->get();
        $teachers = [
           'teachers'=> $teachers,
            'title'=>"Teachers"
        ];

       return   view('teacher.teachers')->with( $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('teacher.add')->with('title',"Add teacher");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    

        $teacher =new Teacher();
        $teacher->first_name = $request->input('f_name');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->salary = $request->input('salary');
        $teacher->birth_date = $request->input('birth_date');
        $teacher->phone_number = $request->input('phone_number');

        $teacher->last_name = $request->input('l_name');

        if($request->hasFile('image')){
            $imageNameWithExtintion =  $request->file('image'); 
            $imageName= pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion=$imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName.Time().'.'.$imageExtintion;
            $teacher->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images',$fileNameToSave);
       }

        $teacher->save();


        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function edit($id)
    {
        return Teacher::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
