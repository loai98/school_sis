@extends('layouts.app')

@section('content')

    @if ($student)
        <div class="container main-content">
            <div class="image-wrapper d-flex align-items-center">
                @if (!empty($student->image))
                    <div class="field-image">
                        <img src='/storage/images/{{ $student->image }}'>
                    </div>
                @endif
                <div class="field-name">
                    <h1 class="title">{{ $student->first_name . ' ' . $student->last_name }}</h1>
                </div>
            </div>
            <div class="fields-wrapper mt-5">
                @if ($student->address)
                    <div class="field-content">
                        <span class="label">Address: </span>
                        <span class="field-data">{{ $student->address }}</span>
                    </div>
                @endif
                @if ($student->age)
                    <div class="field-content">
                        <span class="label">Age: </span>
                        <span class="field-data">{{ $student->age }}</span>
                    </div>
                @endif
                @if ($student->birth_date)
                    <div class="field-content">
                        <span class="label">Birth Date: </span>
                        <span class="field-data">{{ $student->birth_date }}</span>
                    </div>
                @endif
                @if ($student->email)
                    <div class="field-content">
                        <span class="label">Email: </span>
                        <span class="field-data">{{ $student->email }}</span>
                    </div>
                @endif
                @if ($student->parents_id)
                    <div class="field-content">
                        <span class="label">Parent:</span>
                        <a href="/parents/{{$student->parents->id}}" class="field-data">{{ $student->parents->name }}</a>
                    </div>
                @endif
                @if (count($student->course) > 0)
                    <div class="field-content">
                        <span class="label">Courses: </span>
                        <span class="field-data">
                            <ul>
                                @foreach ($student->course as $course)
                                    <li class="item">{{ $course->name }}</li>
                                @endforeach
                            </ul>
                        </span>
                    </div>
                @endif
            </div>
        </div>
        <div class="action-wrapper d-flex">
            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary px-4 mx-2">Edit</a>
            <form action="/students/{{ $student->id }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    @endif

@endsection
