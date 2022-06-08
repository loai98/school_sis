@extends('layouts.app')


@section('content')
    @if (count($courses) > 0)
    <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="medium">Courses</h1>
                </div>
            </div>


            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Course name</td>
                        <td>Nomber of students</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td><div class="title">
                                    <a href="courses/{{ $course->id }}">{{ $course->name }}</a>
                                </div>
                            </td>
                            <td>
                                <span class="count">({{ count($course->student) }}) Students</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif


@endsection
