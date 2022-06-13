@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="card mt-5">
            <div class="card-header d-flex justify-content-between">
                <h1 class="medium">Add new teacher</h1>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="/teachers" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="f_name" hidden>First name</label>
                            <input type="text" class="form-control" name="f_name" placeholder="First Name">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="l_name" hidden>Last name</label>
                            <input type="text" class="form-control" name="l_name" placeholder="Last Name">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="address" hidden>Addres</label>
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="salary" hidden>Salary</label>
                            <input type="number" class="form-control" name="salary" placeholder="Salary">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="phone_number" hidden>Phone Number</label>
                            <input type="tel" name="phone_number" class="form-control" name="phone"
                                placeholder="phone number" pattern="[0-9]*">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="email" hidden>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="birth_date">Birth of date</label>
                            <input type="date" class="form-control" name="birth_date">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-12">
                            <label for="image">Photo</label>
                            <input type="file" accept="image/*" class="form-control" name="image">
                        </div>
                        <div class="form-action mt-5 col-md-6 col-12">
                            <input type="submit" value="Save" class="btn btn-primary px-5">
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
