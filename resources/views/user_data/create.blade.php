@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create Student</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('users.data.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Student Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="student_id">ID</label>
                                            <input type="text" id="uuid" name="uuid" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Phone</label>
                                            <input type="tel" id="phone" name="phone" class="form-control"
                                                required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Contact Person(Referred by)</label>
                                            <input type="tel" id="referral_contact" name="referral_contact"
                                                class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">

                                            <label for="id">Parent ID</label>
                                            <input type="text" id="parent_id" name="parent_id" class="form-control"
                                                required>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="id">Position</label>
                                            <select class="form-control" name="position" id="">

                                                <option value="left">Left</option>
                                                <option value="right">Right</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="country">Select a Country</label>
                                        <select class="form-control select2bs4" name="country" id="">

                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
