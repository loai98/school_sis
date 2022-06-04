@extends('layouts.app')


@section('content')
    @if (count($courses) > 0)
        <div class="container">
            @foreach ($courses as $course)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="title">
                            <a href="course/{{ $course->id }}">{{ $course->name }}</a>
                        </div>
                        <span class="count">({{count($course->student)}}) Students</span>
                    </div>
                </div>
            @endforeach

        </div>
    @endif


@endsection
