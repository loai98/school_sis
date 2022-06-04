@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="actions">
                    <a href="/students" class="btn btn-primary">Students</a>
                    <a href="/parents" class="btn btn-primary">Parents</a>
                    <a href="/teachers" class="btn btn-primary">Teachers</a>
                    <a href="/courses" class="btn btn-primary">Courses</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
