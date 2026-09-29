@extends('admin.layouts.master')

@section('title', 'Take Attendance')

@section('content')

<div class="main-panel">

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Take Attendance</h3>
        </div>

        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <x-admin.phead
                            title="Take Attendance"
                            subtitle="Create a new attendance session.">

                            <a href="{{ route('attendance-sessions.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>

                                Back to Attendance

                            </a>

                        </x-admin.phead>


                        <form action="{{ route('attendance-sessions.store') }}"
                            method="POST">

                            @csrf

                            <div class="row">

                                {{-- Academic Session --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Academic Session
                                        </label>

                                        <select name="academic_session_id"
                                            id="academic_session_id"
                                            class="form-control">

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach ($academicSessions as $academicSession)

                                                <option value="{{ $academicSession->id }}">

                                                    {{ $academicSession->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="academic_session_id" />

                                    </div>

                                </div>


                                {{-- Semester --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Semester
                                        </label>

                                        <select name="semester_id"
                                            id="semester_id"
                                            class="form-control">

                                            <option value="">
                                                Select Semester
                                            </option>

                                            @foreach ($semesters as $semester)

                                                <option value="{{ $semester->id }}"
                                                    data-session="{{ $semester->academic_session_id }}">

                                                    {{ $semester->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="semester_id" />

                                    </div>

                                </div>


                                {{-- Class --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Class
                                        </label>

                                        <select name="class_id"
                                            id="class_id"
                                            class="form-control">

                                            <option value="">
                                                Select Class
                                            </option>

                                            {{-- @foreach ($classes as $class)

                                                <option value="{{ $class->id }}">

                                                    {{ $class->name }}

                                                </option>

                                            @endforeach --}}

                                        </select>

                                        <x-admin.error-msg name="class_id" />

                                    </div>

                                </div>


                                {{-- Section --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Section
                                        </label>

                                        <select name="section_id"
                                            id="section_id"
                                            class="form-control">

                                            <option value="">
                                                Select Section
                                            </option>

                                            @foreach ($sections as $section)

                                                <option value="{{ $section->id }}"
                                                    data-class="{{ $section->class_id }}">

                                                    {{ $section->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="section_id" />

                                    </div>

                                </div>


                                {{-- Subject --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Subject
                                        </label>

                                        <select name="subject_id"
                                            id="subject_id"
                                            class="form-control">

                                            <option value="">
                                                Select Subject
                                            </option>

                                            @foreach ($subjects as $subject)

                                                <option value="{{ $subject->id }}">

                                                    {{ $subject->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="subject_id" />

                                    </div>

                                </div>


                                {{-- Teacher --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Teacher
                                        </label>

                                        <select name="teacher_id"
                                            id="teacher_id"
                                            class="form-control">

                                            <option value="">
                                                Select Teacher
                                            </option>

                                            @foreach ($teachers as $teacher)

                                                <option value="{{ $teacher->id }}">

                                                    {{ $teacher->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <x-admin.error-msg name="teacher_id" />

                                    </div>

                                </div>


                                {{-- Attendance Date --}}
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="form-group">

                                        <label>
                                            Attendance Date
                                        </label>

                                        <input type="date"
                                            name="attendance_date"
                                            class="form-control"
                                            value="{{ old('attendance_date', now()->toDateString()) }}">

                                        <x-admin.error-msg name="attendance_date" />

                                    </div>

                                </div>

                            </div>


                            <button type="submit"
                                class="btn btn-primary me-2">

                                Continue

                            </button>

                            <a href="{{ route('attendance-sessions.index') }}"
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