@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $user->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $user->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (Leave blank if no change)</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control">
                                </div>

                                <!-- Role selection -->
                                <div class="form-group">
                                    <label for="roles">Assign Roles</label>
                                    <select id="roles" name="roles[]" class="form-control" multiple>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ in_array($role->id,
                                            $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
