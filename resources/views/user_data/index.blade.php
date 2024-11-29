@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student List</h3>
                            <a href="{{ route('users.data.create') }}" class="btn btn-primary float-right">Create
                                Student
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Name</th>
                                        <th>Email</th>

                                        <th>Phone</th>

                                        <th>Contact Person</th>

                                        <th>Parent Id</th>

                                        <th>Country</th>
                                        <th>Position</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->user->name }}</td>
                                        <td>{{ $user->user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->referral_contact }}</td>
                                        <td>{{ $user->parent_id }}</td>

                                        <td>{{ $user->country }}</td>

                                        <td>{{ $user->position }}</td>

                                        <td>
                                            <a href="{{ route('users.data.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('users.data.show', $user->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('users.data.delete', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
