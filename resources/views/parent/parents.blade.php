@extends('layouts.app')

@section('content')

    @if (count($parents) > 0)
        <div class="container">

            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="medium">Parents</h1>
                </div>
            </div>

            <table class="table table-striped table-bordered compiled-page">
                <thead>
                    <tr>
                        <td>Parent name</td>
                        <td>Nomber of student</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $parent)
                        <tr>
                            <td><div class="title">
                                    <a href="parents/{{ $parent->id }}">{{ $parent->name }}</a>
                                </div>
                            </td>
                            <td>
                                <span class="count">({{ count($parent->students) }}) Students</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
