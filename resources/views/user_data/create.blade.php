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
                                                value="{{ old('name') }}" required>
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="student_id">ID</label>
                                            <input type="text" id="uuid" name="uuid" class="form-control"
                                                value="{{ old('uuid') }}" required>
                                            @error('uuid') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="tel" id="phone" name="phone" class="form-control"
                                                value="{{ old('phone') }}" required>
                                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="referral_contact">Contact Person (Referred by)</label>
                                            <input type="tel" id="referral_contact" name="referral_contact"
                                                class="form-control" value="{{ old('referral_contact') }}" required>
                                            @error('referral_contact') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="parent_id">Parent ID</label>
                                            <input type="text" id="parent_id" name="parent_id" class="form-control"
                                                value="{{ old('parent_id') }}" required>
                                            @error('parent_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="position">Position</label>
                                            <select class="form-control" name="position" required>
                                                <option value="left" {{ old('position') == 'left' ? 'selected' : '' }}>Left</option>
                                                <option value="right" {{ old('position') == 'right' ? 'selected' : '' }}>Right</option>
                                            </select>
                                            @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Select a Country</label>
                                        <select class="form-control select2bs4" name="country" required>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>
                                                    {{ $country }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" required>
                                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
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
