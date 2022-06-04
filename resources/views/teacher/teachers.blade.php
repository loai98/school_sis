@extends('layouts.app')

@section('content')

    @if (count($teachers) > 0)
        <div class="container">
            @foreach ($teachers as $teacher)
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="title">
                            <a href="teachers/{{ $teacher->id }}">{{ $teacher->first_name . ' ' . $teacher->last_name }}</a>
                        </div>
                       <div class="count">
                           <span >({{count($teacher->course)}}) Courses</span>
                       </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
