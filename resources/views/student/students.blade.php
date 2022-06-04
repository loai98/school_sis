@extends('layouts.app')

@section('content')

    @if (count($students) > 0)
        <div class="container d-flex flex-column">

            @foreach ($students as $student)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="title">
                        <a href="students/{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                        </div>
                        <span class="count">({{count($student->course)}}) Courses</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
