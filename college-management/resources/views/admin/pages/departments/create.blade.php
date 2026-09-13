@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Create Departments</h3>

            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <x-admin.phead title="Add Department" subtitle="Add a new department from here.">
                                <a href="{{ route('departments.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"> </i>
                                    Back to Departments</a>
                            </x-admin.phead>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        {{-- <h4 class="card-title">Create Department</h4>
                                        <p class="card-description">Add a new department</p> --}}

                                        <form action="{{ route('departments.store') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label>Department Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Department name" value="{{ old('name') }}">
                                                <x-admin.error-msg name="name" />

                                            </div>

                                            <div class="form-group">
                                                <label>Department Code</label>
                                                <input type="text" class="form-control" name="code"
                                                    placeholder="Department code" value="{{ old('code') }}">
                                                <x-admin.error-msg name="code" />

                                            </div>

                                            <button type="submit" class="btn btn-primary me-2">
                                                Create Department
                                            </button>

                                            <a href="{{ route('departments.index') }}" class="btn btn-dark">
                                                Cancel
                                            </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
