@extends('admin.layouts.master')

@section('title', 'Add Academic Class')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <x-admin.phead
                title="Add Academic Class"
                subtitle="Academic Classes"
                desc="Create a new academic class"
            />
        </div>

        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        
                        <x-admin.phead title="Academic Class Information" subtitle="Add a new academic class from here.">
                                <a href="{{ route('academic-classes.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"> </i>
                                    Back to Academic Classes</a>
                            </x-admin.phead>

                        <p class="card-description">
                            Enter academic class details
                        </p>

                        <form class="forms-sample"
                              action="{{ route('academic-classes.store') }}"
                              method="POST">

                            @csrf

                            {{-- Course --}}
                            <div class="form-group">

                                <label for="course_id">
                                    Course
                                </label>

                                <select name="course_id"
                                        id="course_id"
                                        class="form-control @error('course_id') is-invalid @enderror">

                                    <option value="">
                                        Select Course
                                    </option>

                                    @foreach($courses as $course)

                                        <option value="{{ $course->id }}"
                                            {{ old('course_id') == $course->id ? 'selected' : '' }}>

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

                                <label for="name">
                                    Class Name
                                </label>

                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Example: 1st Year">

                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Code --}}
                            <div class="form-group">

                                <label for="code">
                                    Class Code
                                </label>

                                <input type="text"
                                       name="code"
                                       id="code"
                                       value="{{ old('code') }}"
                                       class="form-control @error('code') is-invalid @enderror"
                                       placeholder="Example: CSE-101">

                                @error('code')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Description --}}
                            <div class="form-group">

                                <label for="description">
                                    Description
                                </label>

                                <textarea name="description"
                                          id="description"
                                          rows="4"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Enter class description">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <button type="submit"
                                    class="btn btn-primary me-2">
                                Create Class
                            </button>

                            <a href="{{ route('academic-classes.index') }}"
                               class="btn btn-dark">
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