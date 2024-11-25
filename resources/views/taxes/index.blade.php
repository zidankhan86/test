@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Taxes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Taxes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Dynamic column width based on $action -->
                <div
                    class="{{ isset($action) && ($action == 'create' || $action == 'edit') ? 'col-md-6' : 'col-md-12' }}">
                    @if (isset($action) && $action == 'create')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Tax</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('taxes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tax Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate (%)</label>
                                    <input type="number" class="form-control" id="rate" name="rate" step="0.01"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('taxes.index') }}" class="btn btn-secondary">Back to List</a>
                            </form>
                        </div>
                    </div>
                    @elseif (isset($action) && $action == 'edit')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Tax</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('taxes.update', $tax->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Tax Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $tax->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate (%)</label>
                                    <input type="number" class="form-control" id="rate" name="rate"
                                        value="{{ $tax->rate }}" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1" {{ $tax->is_active == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $tax->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('taxes.index') }}" class="btn btn-secondary">Back to List</a>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Taxes List</h3>
                            @can('tax-create')
                            <a href="{{ route('taxes.create') }}" class="btn btn-success float-right">Create New Tax</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Rate (%)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taxes as $tax)
                                    <tr>
                                        <td>{{ $tax->name }}</td>
                                        <td>{{ $tax->rate }}</td>
                                        <td>{{ $tax->is_active ? 'Active' : 'Inactive' }}</td>

                                        <td>
                                            @can('tax-edit')
                                            <a href="{{ route('taxes.edit', $tax->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            @endcan
                                            @can('tax-delete')
                                            <form action="{{ route('taxes.destroy', $tax->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
