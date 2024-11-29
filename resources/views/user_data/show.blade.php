@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Students</h1>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Student Name:</label>
                        <p>{{ $user->user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <p>{{ $user->user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="form-group">
                        <label>Contact Person:</label>
                        <p>{{ $user->referral_contact }}</p>
                    </div>
                    <div class="form-group">
                        <label>Parent ID:</label>
                        <p>{{ $user->parent_id }}</p>
                    </div>
                    <div class="form-group">
                        <label>Country:</label>
                        <p>{{ $user->country }}</p>
                    </div>
                    <div class="form-group">
                        <label>Position:</label>
                        <p>{{ $user->position }}</p>
                    </div>
                    <a href="{{ route('users.data.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
