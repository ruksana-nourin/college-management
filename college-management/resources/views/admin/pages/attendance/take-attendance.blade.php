@extends('admin.layouts.master')

@section('content')

<div class="main-panel">

    <div class="content-wrapper">

        <div class="page-header">

            <h3 class="page-title">
                Take Attendance
            </h3>

        </div>


        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <x-admin.phead
                            title="Take Attendance"
                            subtitle="Mark attendance for students."
                        >

                            <a href="{{ route('attendance-sessions.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>

                                Back to Attendance

                            </a>

                        </x-admin.phead>


                        {{-- Session Information --}}

                        <div class="row">

                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Course</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $attendanceSession->subject->course->name }}"
                                        readonly
                                    >

                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Subject</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $attendanceSession->subject->name }}"
                                        readonly
                                    >

                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Class</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $attendanceSession->academicClass->name }}"
                                        readonly
                                    >

                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Section</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $attendanceSession->section->name }}"
                                        readonly
                                    >

                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Teacher</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $attendanceSession->teacher->name }}"
                                        readonly
                                    >

                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="form-group">

                                    <label>Attendance Date</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ \Carbon\Carbon::parse($attendanceSession->attendance_date)->format('d M, Y') }}"
                                        readonly
                                    >

                                </div>

                            </div>

                        </div>


                        <hr>


                        {{-- Student Attendance --}}

                        <form method="POST"
                            action="{{ route('attendance-sessions.store-attendance', $attendanceSession->id) }}">

                            @csrf


                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h4 class="card-title mb-0">
                                    Student Attendance
                                </h4>

                                <button
                                    type="button"
                                    id="markAllPresent"
                                    class="btn btn-outline-success btn-sm">

                                    <i class="mdi mdi-check-all"></i>

                                    Mark All Present

                                </button>

                            </div>


                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th width="60">
                                                #
                                            </th>

                                            <th>
                                                Student
                                            </th>

                                            <th width="250" class="text-center">
                                                Attendance
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @foreach ($students as $index => $student)

                                            <tr>

                                                <td>
                                                    {{ $index + 1 }}
                                                </td>


                                                <td>

                                                    <div class="d-flex align-items-center">

                                                        @if ($student->image)

                                                            <img
                                                                src="{{ asset($student->image) }}"
                                                                width="42"
                                                                height="42"
                                                                class="rounded-circle mr-3"
                                                            >

                                                        @endif


                                                        <div>

                                                            <div class="font-weight-bold">

                                                                {{ $student->name }}

                                                            </div>


                                                            <small class="text-muted">

                                                                {{ $student->student_id }}

                                                            </small>

                                                        </div>

                                                    </div>

                                                </td>


                                                <td class="text-center">

                                                    <div class="attendance-toggle">

                                                        <input
                                                            type="radio"
                                                            name="attendance[{{ $student->id }}]"
                                                            id="present_{{ $student->id }}"
                                                            value="Present"
                                                            checked
                                                        >

                                                        <label
                                                            for="present_{{ $student->id }}"
                                                            class="present-btn"
                                                        >

                                                            <i class="mdi mdi-check"></i>
                                                            Present

                                                        </label>


                                                        <input
                                                            type="radio"
                                                            name="attendance[{{ $student->id }}]"
                                                            id="absent_{{ $student->id }}"
                                                            value="Absent"
                                                        >

                                                        <label
                                                            for="absent_{{ $student->id }}"
                                                            class="absent-btn"
                                                        >

                                                            <i class="mdi mdi-close"></i>
                                                            Absent

                                                        </label>

                                                    </div>

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>


                            <div class="mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-primary">

                                    <i class="mdi mdi-content-save"></i>

                                    Save Attendance

                                </button>

                                <a
                                    href="{{ route('attendance-sessions.index') }}"
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

@section('scripts')

<script>

    $('#markAllPresent').on('click', function () {

        $('input[type="radio"][value="Present"]').prop(
            'checked',
            true
        );

    });

</script>

@endsection