@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">   
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create New User</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">ID</label>
                                        <input type="text" id="student_id" name="student_id" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Phone</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Contact Person(Referred by)</label>
                                        <input type="tel" id="referred_contact" name="referred_contact" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id">Parent ID</label>
                                    <input type="text" id="parent_id" name="parent_id" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="id">Position</label>
                                    <select class="form-control" name="position" id="">

                                        <option value="0">Left</option>
                                        <option value="1">Right</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" class="form-control" required>
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

                                <!-- Role selection -->
                                <div class="form-group">
                                    <label for="roles">Assign Roles</label>
                                    <select id="roles" name="roles[]" class="form-control" multiple>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
