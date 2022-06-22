@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h1 class="medium">Edit {{$student->first_name}}</h1>
            </div>


            <div class="card-body d-flex align-items-end">
                <form class="row" action="/students/{{$student->id}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="f_name" hidden>First Name</label>
                        <input value="{{ $student->first_name }}" class="form-control" type="text" name="f_name"
                            placeholder="First name" required>
                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="l_name" hidden>Last name</label>
                        <input value="{{ $student->lastt_name }}" class="form-control" type="text" name="l_name"
                            placeholder="Last name">
                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="address" hidden>Address</label>
                        <input value="{{ $student->address }}" class="form-control" type="text" name="address"
                            placeholder="Address">
                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="age" hidden>Age</label>
                        <input value="{{ $student->age }}" class="form-control" type="number" name="Age"
                            placeholder="Age">
                    </div>

                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="email" hidden>Email</label>
                        <input value="{{ $student->email }}" class="form-control" type="email" name="email"
                            placeholder="Email" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="parent" hidden>Parent</label>
                        <select value="{{ $student->parents }}" name="parent" list="parent" placeholder="Choose parent"
                            class="form-select" required>
                            <option disabled selected value="null"> -- Choose parent -- </option>
                            @if (count($parents) > 0)
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}"
                                        @if ($student->parents_id == $parent->id)
                                        selected                                            
                                        @endif
                                    >{{ $parent->name }}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="birth_date">Birth date</label>
                        <input  value="{{ $student->birth_date }}" class="form-control" type="date" name="birth_date" placeholder="Birth  date">
                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="image">Photo</label>
                        <input class="form-control" type="file" accept="image/*" name="image">
                        <span>Leave empty to save current image</span>
                    </div>
                    <div class="form-group col-md-6 col-12 mb-2">
                        <label for="courses">Coursses</label>
                        <select name="courses[]" list="courses" class="form-select" multiple>
                            @if (count($courses) > 0)
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        @if (  in_array($course->id, $student_courses) )
                                            selected
                                        @endif                                        
                                        
                                        >{{ $course->name }}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>

                    <div class="form-action mt-5 col-12">
                        <div class="col-6">
                        <input type="submit" value="Save" class="btn btn-primary px-5">
                        </div>
                    </div>
                </form>
                <form action="/students/{{$student->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            </div>



        </div>
    </div>
@endsection
