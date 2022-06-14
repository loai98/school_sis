@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="card mt-5">
            <div class="card-header d-flex justify-content-between">
                <h1 class="medium">Add new teacher</h1>
            </div>
            <div class="card-body d-flex align-items-end">
                <form enctype="multipart/form-data" action="/teachers/{{$teacher->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <div class="row">
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="f_name" hidden>First name</label>
                            <input  type="text" value="{{$teacher->first_name}}" class="form-control" name="f_name" required
                                placeholder="First Name">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="l_name" hidden>Last name</label>
                            <input type="text" value="{{$teacher->last_name}}" class="form-control" name="l_name" placeholder="Last Name">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="address" hidden>Addres</label>
                            <input type="text" value="{{$teacher->address}}" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="salary" hidden>Salary</label>
                            <input type="number" value="{{$teacher->salary}}" class="form-control" name="salary" placeholder="Salary">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="phone_number" hidden>Phone Number</label>
                            <input type="tel" value="{{$teacher->phone_number}}" name="phone_number" class="form-control" name="phone"
                                placeholder="phone number" pattern="[0-9]*">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="email" hidden>Email</label>
                            <input required type="email" class="form-control" value="{{$teacher->email}}" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="birth_date">Birth of date</label>
                            <input type="date" value="{{$teacher->birth_date}}" class="form-control" name="birth_date">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="image">Photo</label>
                            <input type="file"  accept="image/*" class="form-control" name="image">
                            <span>Leave empty to save current image</span>
                        </div>
                        <div class="form-group">
                        <select name="courses[]" id="courses" multiple>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    @if (in_array($course->id,$teacher_courses))
                                    selected                                        
                                    @endif
                                    >{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="form-action mt-5 col-md-6 col-12">
                            <input type="submit" value="Update" class="btn btn-primary px-5">
                        </div>

                    </div>
                </form>
                <form action='/teachers/{{ $teacher->id}}' method="post" >
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" class="btn btn-danger px-3" value="Delete">
                </form>
            </div>
        </div>


    </div>
@endsection
