@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Student</h1>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.data.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Student Name -->
                                <div class="form-group col-md-6">
                                    <label for="name">Student Name</label>
                                    <input type="text" id="name" value="{{ old('name', $user->user->name) }}"
                                        name="name" class="form-control" required>
                                </div>
                                <!-- Student ID -->
                                <div class="form-group col-md-6">
                                    <label for="uuid">Student ID</label>
                                    <input type="text" id="uuid" name="uuid"
                                        value="{{ old('uuid', $user->uuid) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Phone -->
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone"
                                        value="{{ old('phone', $user->phone) }}" class="form-control">
                                </div>
                                <!-- Contact Person -->
                                <div class="form-group col-md-6">
                                    <label for="referral_contact">Contact Person</label>
                                    <input type="text" name="referral_contact" id="referral_contact"
                                        value="{{ old('referral_contact', $user->referral_contact) }}" class="form-control">
                                </div>
                            </div>



                            <div class="row">
                                <!-- Parent ID -->
                                <div class="form-group col-md-6">
                                    <label for="parent_id">Parent ID</label>
                                    <input type="text" name="parent_id" id="parent_id"
                                        value="{{ old('parent_id', $user->parent_id) }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" value="{{ old('parent_id', $user->user->email) }}"
                                        name="email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label for="country">Select a Country</label>
                                <select class="form-control select2bs4" name="country" id="country">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"
                                            {{ old('country', $user->country) == $country ? 'selected' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Position -->
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" id="position"
                                    value="{{ old('position', $user->position) }}" class="form-control">
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
