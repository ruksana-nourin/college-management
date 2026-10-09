@extends('admin.layouts.master')

@section('title', 'Add Subject')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Subjects</h3>
        </div>

        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <x-admin.phead
                            title="Add Subject"
                            subtitle="Add a new subject from here.">

                            <a href="{{ route('subjects.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>

                                Back to Subjects

                            </a>

                        </x-admin.phead>


                        <form action="{{ route('subjects.store') }}"
                            method="POST">

                            @csrf

                            <div class="row">

                                {{-- Subject Name --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label for="name">
                                            Subject Name
                                        </label>

                                        <input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            placeholder="Enter subject name"
                                            value="{{ old('name') }}">

                                        <x-admin.error-msg name="name" />

                                    </div>

                                </div>


                                {{-- Course --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label for="course_id">
                                            Course
                                        </label>

                                        <select name="course_id"
                                            id="course_id"
                                            class="form-control">

                                            <option value="">
                                                Select Course
                                            </option>

                                            @foreach ($courses as $course)

                                                <option value="{{ $course->id }}"
                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                                    {{ $course->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="course_id" />

                                    </div>

                                </div>

                            </div>


                            <button type="submit"
                                class="btn btn-primary me-2">

                                Create Subject

                            </button>

                            <a href="{{ route('subjects.index') }}"
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