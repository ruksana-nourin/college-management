@extends('admin.layouts.master')

@section('title', 'Teachers - Edit')

@section('styles') <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

```
<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Teacher</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Edit Teacher"
                            subtitle="Update teacher information from here.">

                            <a href="{{ route('teachers.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>
                                Back to Teachers

                            </a>

                        </x-admin.phead>


                        {{-- Teacher Edit Form --}}
                        <form action="{{ route('teachers.update', $teacher->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')


                            <div class="row">

                                {{-- Teacher Code --}}
                                <div class="col-md-6 mb-4">

                                    <label for="teacher_code">
                                        Teacher Code
                                    </label>

                                    <input type="text"
                                        class="form-control @error('teacher_code') is-invalid @enderror"
                                        id="teacher_code"
                                        name="teacher_code"
                                        value="{{ old('teacher_code', $teacher->teacher_code) }}"
                                        placeholder="Enter teacher code">

                                    @error('teacher_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Name --}}
                                <div class="col-md-6 mb-4">

                                    <label for="name">
                                        Teacher Name
                                    </label>

                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $teacher->name) }}"
                                        placeholder="Enter teacher name">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Email --}}
                                <div class="col-md-6 mb-4">

                                    <label for="email">
                                        Email
                                    </label>

                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $teacher->email) }}"
                                        placeholder="Enter email">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Phone --}}
                                <div class="col-md-6 mb-4">

                                    <label for="phone">
                                        Phone
                                    </label>

                                    <input type="text"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone', $teacher->phone) }}"
                                        placeholder="Enter phone number">

                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Department --}}
                                <div class="col-md-6 mb-4">

                                    <label for="department_id">
                                        Department
                                    </label>

                                    <select name="department_id"
                                        id="department_id"
                                        class="form-control @error('department_id') is-invalid @enderror">

                                        <option value="">
                                            Select Department
                                        </option>

                                        @foreach ($departments as $department)

                                            <option value="{{ $department->id }}"
                                                {{ old('department_id', $teacher->department_id) == $department->id ? 'selected' : '' }}>

                                                {{ $department->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Image --}}
                                <div class="col-md-6 mb-4">

                                    <label for="img">
                                        Teacher Image
                                    </label>

                                    <input type="file"
                                        class="form-control @error('img') is-invalid @enderror"
                                        id="img"
                                        name="img"
                                        accept="image/*">

                                    @error('img')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @if ($teacher->img)

                                        <div class="mt-3">

                                            <img src="{{ asset($teacher->img) }}"
                                                alt="{{ $teacher->name }}"
                                                width="80"
                                                height="80"
                                                class="rounded-circle">

                                            <p class="text-muted mt-2 mb-0">
                                                Current Image
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            {{-- Actions --}}
                            <div class="text-right mt-3">

                                <a href="{{ route('teachers.index') }}"
                                    class="btn btn-dark me-2">

                                    Cancel

                                </a>

                                <button type="submit"
                                    class="btn btn-primary">

                                    <i class="mdi mdi-content-save"></i>
                                    Update Teacher

                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
```

@endsection
