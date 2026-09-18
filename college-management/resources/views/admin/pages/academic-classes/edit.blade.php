@extends('admin.layouts.master')

@section('title', 'Academic Classes - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Academic Class</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Edit Academic Class"
                            subtitle="Update academic class information from here."
                        >
                            <a
                                href="{{ route('academic-classes.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Academic Classes
                            </a>
                        </x-admin.phead>

                        <form
                            action="{{ route('academic-classes.update', ['academic_class' => $academicClass->id]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            {{-- Course --}}
                            <div class="form-group">
                                <label for="course_id">Course</label>

                                <select
                                    name="course_id"
                                    id="course_id"
                                    class="form-control @error('course_id') is-invalid @enderror"
                                >
                                    <option value="">Select Course</option>

                                    @foreach($courses as $course)
                                        <option
                                            value="{{ $course->id }}"
                                            {{ old('course_id', $academicClass->course_id) == $course->id ? 'selected' : '' }}
                                        >
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('course_id')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Class Name --}}
                            <div class="form-group">
                                <label for="name">Class Name</label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name', $academicClass->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter class name"
                                >

                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Class Code --}}
                            <div class="form-group">
                                <label for="code">Class Code</label>

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    value="{{ old('code', $academicClass->code) }}"
                                    class="form-control @error('code') is-invalid @enderror"
                                    placeholder="Enter class code"
                                >

                                @error('code')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter description"
                                >{{ old('description', $academicClass->description) }}</textarea>

                                @error('description')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-content-save"></i>
                                Update Class
                            </button>

                            <a
                                href="{{ route('academic-classes.index') }}"
                                class="btn btn-dark btn-rounded btn-fw"
                            >
                                Cancel
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection