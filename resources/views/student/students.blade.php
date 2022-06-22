@extends('layouts.app')

@section('content')

    @if (count($students) > 0)
        <div class="container">
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between">
                    <div class="title">
                        <h1 class="medium">Students</h1>
                    </div>
                    <div class="">
                        <a href="students/create" class="btn btn-primary  px-5">Add new student</a>
                    </div>
                </div>
            </div>


            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Student name</td>
                        <td>Nomber of courses</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>
                                <div class="title">
                                    <a
                                        href="students/{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                                </div>
                            </td>
                            <td>
                                <span class="count">({{ count($student->course) }}) Courses</span>
                            </td>
                            <td>
                                <div class="action-wrapper d-flex justify-content-center">
                                    <a href="students/{{ $student->id }}/edit" class="btn btn-primary px-4 mx-2">Edit</a>
                                    <form action="students/{{ $student->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
