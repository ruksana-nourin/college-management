@extends('admin.layouts.master')

@section('title', 'Create Teacher')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Create Teachers</h3>
            </div>

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead title="Add Teacher" subtitle="Add a new teacher from here.">

                                <a href="{{ route('teachers.index') }}" class="btn btn-warning btn-rounded btn-fw">

                                    <i class="mdi mdi-arrow-left"></i>

                                    Back to Teachers

                                </a>

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

                                        <form action="{{ route('teachers.store') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf


                                            <div class="row">

                                                {{-- Teacher Code --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Teacher ID</label>

                                                        <input type="text" class="form-control" name="teacher_code"
                                                            placeholder="Teacher ID" value="{{ old('teacher_code') }}">

                                                        <x-admin.error-msg name="teacher_code" />

                                                    </div>
                                                </div>


                                                {{-- Name --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Teacher Name</label>

                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Teacher name" value="{{ old('name') }}">

                                                        <x-admin.error-msg name="name" />

                                                    </div>
                                                </div>


                                                {{-- Email --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Email</label>

                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Teacher email" value="{{ old('email') }}">

                                                        <x-admin.error-msg name="email" />

                                                    </div>
                                                </div>


                                                {{-- Phone --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Phone</label>

                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="Teacher phone" value="{{ old('phone') }}">

                                                        <x-admin.error-msg name="phone" />

                                                    </div>
                                                </div>


                                                {{-- Department --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Department</label>

                                                        <select name="department_id" class="form-control">

                                                            <option value="">
                                                                Select Department
                                                            </option>

                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}"
                                                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>

                                                                    {{ $department->name }}

                                                                </option>
                                                            @endforeach

                                                        </select>

                                                        <x-admin.error-msg name="department_id" />

                                                    </div>
                                                </div>


                                                {{-- Image --}}
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label>Teacher Image</label>

                                                        <input type="file" class="form-control" name="img"
                                                            accept="image/*">

                                                        <x-admin.error-msg name="img" />

                                                    </div>
                                                </div>

                                            </div>


                                            <button type="submit" class="btn btn-primary me-2">

                                                Create Teacher

                                            </button>


                                            <a href="{{ route('teachers.index') }}" class="btn btn-dark">

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

@endsection
