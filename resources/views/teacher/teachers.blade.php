@extends('layouts.app')

@section('content')

    @if (count($teachers) > 0)
        <div class="container">

            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between">
                    <h1 class="medium">{{$title}}</h1>
                    <a href="/teachers/create" class="btn btn-primary px-5">Add teacher</a>

                </div>
            </div>

            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Nomber of courses</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td><div class="title">
                                    <a href="teachers/{{ $teacher->id }}">{{ $teacher->first_name." ".$teacher->last_name }}</a>
                                </div>
                            </td>
                            <td>
                                <span class="count">({{ count($teacher->courses) }}) Courses</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="teachers/{{ $teacher->id}}/edit" class="btn btn-primary mx-2 px-4">Edit</a>
                                    <form action='teachers/{{ $teacher->id}}' method="post" >
                                        @csrf 
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" class="btn btn-danger px-3" value="Delete">
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
