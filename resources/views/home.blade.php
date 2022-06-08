@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h1 class="medium">{{ __('Dashboard') }}</h1></div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <table class="actions table table-striped table-bordered compiled-page">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Number of items</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="title">
                            <a href="/students">Students</a>
                        </div>
                    </td>
                    <td>
                        <span class="count">{{ $students }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="title">
                            <a href="/parents">Parents</a>
                        </div>
                    </td>
                    <td>
                        <span class="count">{{ $parents }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="title">
                            <a href="/teachers">Teachers</a>
                        </div>
                    </td>
                    <td>
                        <span class="count">{{ $teachers }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="title">
                            <a href="/courses">Courses</a>
                        </div>
                    </td>
                    <td>
                        <span class="count">{{ $courses }}</span>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
@endsection
