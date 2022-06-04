@extends('layouts.app')

@section('content')

    @if (count($parents) > 0)
        <div class="container">
            @foreach ($parents as $parent)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="title">
                    <a href="parents/{{ $parent->id }}">{{ $parent->name }}</a>
                </div>
                <span class="count" >({{count($parent->students)}}) Students</span>
            </div>

            </div>

            @endforeach
        </div>
    @endif

@endsection
