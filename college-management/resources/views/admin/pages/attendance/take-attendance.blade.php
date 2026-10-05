@extends('admin.layouts.master')
@section('title', 'Take Attendance')

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


                            {{-- Student Attendance --}}
<div class="card mt-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="card-title mb-1">
                    <i class="mdi mdi-account-check text-primary"></i>
                    Student Attendance
                </h4>

                <p class="text-muted mb-0">
                    Mark attendance for each student
                </p>
            </div>

            <button type="button"
                id="markAllPresent"
                class="btn btn-outline-success btn-rounded">
                <i class="mdi mdi-check-all"></i>
                Mark All Present
            </button>

        </div>


        {{-- Attendance Summary --}}
        <div class="row mb-4">

            <div class="col-lg-4 col-md-4 col-12 mb-2">
                <div class="attendance-summary total">
                    <div class="summary-icon">
                        <i class="mdi mdi-account-group"></i>
                    </div>

                    <div>
                        <small>Total Students</small>
                        <h4 id="totalStudents">
                            {{ $students->count() }}
                        </h4>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-12 mb-2">
                <div class="attendance-summary present">
                    <div class="summary-icon">
                        <i class="mdi mdi-check-circle"></i>
                    </div>

                    <div>
                        <small>Present</small>
                        <h4 id="presentCount">0</h4>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-12 mb-2">
                <div class="attendance-summary absent">
                    <div class="summary-icon">
                        <i class="mdi mdi-close-circle"></i>
                    </div>

                    <div>
                        <small>Absent</small>
                        <h4 id="absentCount">0</h4>
                    </div>
                </div>
            </div>

        </div>


        {{-- Table Header --}}
        <div class="attendance-header d-none d-md-flex">

            <div class="student-number">
                #
            </div>

            <div class="student-info">
                Student
            </div>

            <div class="attendance-status">
                Attendance
            </div>

        </div>


        {{-- Students --}}
        <div class="attendance-list">

            @foreach ($students as $index => $student)

                <div class="attendance-row">

                    {{-- Number --}}
                    <div class="student-number">
                        {{ $index + 1 }}
                    </div>


                    {{-- Student --}}
                    <div class="student-info">

                        <div class="student-avatar">

                            @if ($student->image)
                                <img src="{{ asset($student->image) }}"
                                    alt="{{ $student->name }}">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            @endif

                        </div>


                        <div class="student-details">

                            <h6>
                                {{ $student->name }}
                            </h6>

                            <small>
                                ID: {{ $student->student_id }}
                            </small>

                        </div>

                    </div>


                    {{-- Attendance --}}
                    <div class="attendance-status">

                        <label class="attendance-option present-option">

                            <input type="radio"
                                name="attendance[{{ $student->id }}]"
                                value="Present"
                                class="attendance-radio"
                                data-status="present"
                                checked>

                            <span>
                                <i class="mdi mdi-check"></i>
                                Present
                            </span>

                        </label>


                        <label class="attendance-option absent-option">

                            <input type="radio"
                                name="attendance[{{ $student->id }}]"
                                value="Absent"
                                class="attendance-radio"
                                data-status="absent">

                            <span>
                                <i class="mdi mdi-close"></i>
                                Absent
                            </span>

                        </label>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Buttons --}}
        <div class="mt-4">

            <button type="submit"
                class="btn btn-primary btn-lg">
                <i class="mdi mdi-content-save"></i>
                Save Attendance
            </button>

            <a href="{{ route('attendance-sessions.index') }}"
                class="btn btn-dark btn-lg">
                Cancel
            </a>

        </div>

    </div>
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

    function updateAttendanceCount() {

    let total = $('.attendance-radio:checked').length;

    let present = $('.attendance-radio:checked[value="Present"]').length;

    let absent = $('.attendance-radio:checked[value="Absent"]').length;

    $('#totalStudents').text(total);
    $('#presentCount').text(present);
    $('#absentCount').text(absent);
}


$(document).on('change', '.attendance-radio', function() {

    updateAttendanceCount();

});


$('#markAllPresent').on('click', function() {

    $('.present-option input').prop('checked', true);

    updateAttendanceCount();

});


updateAttendanceCount();

</script>

@endsection
