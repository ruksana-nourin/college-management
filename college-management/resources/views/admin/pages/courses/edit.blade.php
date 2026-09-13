@extends('admin.layouts.master')

@section('title', 'Edit Course')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Course</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Course"
                            subtitle="Update course information from here."
                        >
                            <a href="{{ route('courses.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Courses
                            </a>
                        </x-admin.phead>

                        <form method="POST"
                            action="{{ route('courses.update', ['course' => $course->id]) }}">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- Department --}}
                                <div class="col-md-6 mb-3">

                                    <label for="department_id">
                                        Department
                                    </label>

                                    <select
                                        name="department_id"
                                        id="department_id"
                                        class="form-control">

                                        <option value="">
                                            Select Department
                                        </option>

                                        @foreach ($departments as $department)

                                            <option
                                                value="{{ $department->id }}"
                                                {{ old('department_id', $course->department_id) == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('department_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- Course Name --}}
                                <div class="col-md-6 mb-3">

                                    <label for="name">
                                        Course Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="{{ old('name', $course->name) }}"
                                        placeholder="Enter course name">

                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- Course Code --}}
                                <div class="col-md-6 mb-3">

                                    <label for="code">
                                        Course Code
                                    </label>

                                    <input
                                        type="text"
                                        name="code"
                                        id="code"
                                        class="form-control"
                                        value="{{ old('code', $course->code) }}"
                                        placeholder="Enter course code">

                                    @error('code')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- Duration --}}
                                <div class="col-md-6 mb-3">

                                    <label for="duration">
                                        Duration
                                    </label>

                                    <input
                                        type="number"
                                        name="duration"
                                        id="duration"
                                        class="form-control"
                                        value="{{ old('duration', $course->duration) }}"
                                        placeholder="Enter duration in years"
                                        min="1">

                                    @error('duration')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                {{-- Description --}}
                                <div class="col-md-12 mb-3">

                                    <label for="description">
                                        Description
                                    </label>

                                    <textarea
                                        name="description"
                                        id="description"
                                        rows="5"
                                        class="form-control"
                                        placeholder="Enter course description">{{ old('description', $course->description) }}</textarea>

                                    @error('description')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="mt-3">

                                <button
                                    type="submit"
                                    class="btn btn-primary me-2">
                                    <i class="mdi mdi-content-save"></i>
                                    Update Course
                                </button>

                                <a
                                    href="{{ route('courses.index') }}"
                                    class="btn btn-dark">
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection