@extends('layouts.app')

@section('content')

    @if ($teacher)
        <div class="container main-content">
            <div class="image-wrapper d-flex align-items-center">
                @if (!empty($teacher->image))
                    <div class="field-image">
                        <img src='/storage/images/{{ $teacher->image }}'>
                    </div>
                @endif
                <div class="field-name">
                    <h1 class="title">{{ $teacher->first_name . ' ' . $teacher->last_name }}</h1>
                </div>
            </div>
            <div class="fields-wrapper mt-5">
                @if ($teacher->address)
                    <div class="field-content">
                        <span class="label">Address: </span>
                        <span class="field-data">{{ $teacher->address }}</span>
                    </div>
                @endif
                @if ($teacher->salary)
                    <div class="field-content">
                        <span class="label">Salary: </span>
                        <span class="field-data">{{ $teacher->salary }}</span>
                    </div>
                @endif
                @if ($teacher->birth_date)
                    <div class="field-content">
                        <span class="label">Birth Date: </span>
                        <span class="field-data">{{ $teacher->birth_date }}</span>
                    </div>
                @endif
                @if ($teacher->email)
                    <div class="field-content">
                        <span class="label">Email: </span>
                        <span class="field-data">{{ $teacher->email }}</span>
                    </div>
                @endif
                @if ($teacher->phone_number)
                    <div class="field-content">
                        <span class="label">Phone number: </span>
                        <span class="field-data">{{ $teacher->phone_number }}</span>
                    </div>
                @endif
                @if (count($teacher->courses) > 0)
                    <div class="field-content">
                        <span class="label">Courses: </span>
                        <span class="field-data">
                            <ul>
                                @foreach ($teacher->courses as $course)
                                    <li class="item">{{ $course->name }}</li>
                                @endforeach
                            </ul>
                        </span>
                    </div>
                @endif
            </div>
            <div class="d-flex ">
                                    <a href="/teachers/{{ $teacher->id}}/edit" class="btn btn-primary mx-2 px-4">Edit</a>
                                    <form action='/teachers/{{ $teacher->id}}' method="post" >
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" class="btn btn-danger px-3" value="Delete">
                                    </form>
                                </div>
        </div>
    @endif

@endsection
