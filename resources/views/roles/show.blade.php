@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Role Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role: {{ $role->name }}</h3>
                        </div>
                        <div class="card-body">
                            <h5>Assigned Permissions</h5>
                            <ul class="list-group">
                                @forelse($rolePermissions as $permission)
                                <li class="list-group-item">{{ $permission->name }}</li>
                                @empty
                                <li class="list-group-item text-muted">No permissions assigned</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit Role</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
