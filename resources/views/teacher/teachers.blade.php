@extends('layouts.app')

@section('content')

    @if (count($teachers) > 0)
        <div class="container">

            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="medium">{{$title}}</h1>
                </div>
            </div>

            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Nomber of courses</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
