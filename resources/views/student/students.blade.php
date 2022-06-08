@extends('layouts.app')

@section('content')

    @if (count($students) > 0)
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="medium">Students</h1>
                </div>
            </div>


            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Student name</td>
                        <td>Nomber of courses</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td><div class="title">
                                    <a href="students/{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                                </div>
                            </td>
                            <td>
                                <span class="count">({{ count($student->course) }}) Courses</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
