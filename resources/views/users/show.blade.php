@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Left column for first set of data -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <p>{{ $user->name }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <p>{{ $user->email }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="created_at">Created At</label>
                                        <p>{{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                                    </div>
                                </div>

                                <!-- Right column for second set of data -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        <ul>
                                            @foreach($user->roles as $role)
                                            <li>{{ $role->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="form-group">
                                        <label for="updated_at">Updated At</label>
                                        <p>{{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
