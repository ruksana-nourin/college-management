@extends('admin.layouts.master')

@section('title', 'Edit Attendance')

@section('content')

<div class="main-panel">

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">
                Edit Attendance
            </h3>
        </div>


        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Attendance"
                            subtitle="Update student attendance."
                        >

                            <a href="{{ route('attendance-sessions.show', $attendanceSession->id) }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>
                                Back to Details

                            </a>

                        </x-admin.phead>


                        {{-- Session Information --}}

                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Course</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ $attendanceSession->subject->course->name ?? 'N/A' }}"
                                    readonly>

                            </div>


                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Subject</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ $attendanceSession->subject->name ?? 'N/A' }}"
                                    readonly>

                            </div>


                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Teacher</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ $attendanceSession->teacher->name ?? 'N/A' }}"
                                    readonly>

                            </div>


                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Class</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ $attendanceSession->academicClass->name ?? 'N/A' }}"
                                    readonly>

                            </div>


                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Section</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ $attendanceSession->section->name ?? 'N/A' }}"
                                    readonly>

                            </div>


                            <div class="col-lg-4 col-md-6 col-12 mb-3">

                                <label>Attendance Date</label>

                                <input type="text"
                                    class="form-control"
                                    value="{{ \Carbon\Carbon::parse($attendanceSession->attendance_date)->format('d M, Y') }}"
                                    readonly>

                            </div>

                        </div>


                        <hr class="my-4">


                        {{-- Attendance Form --}}

                        <form method="POST"
                            action="{{ route('attendance-sessions.update', $attendanceSession->id) }}">

                            @csrf
                            @method('PUT')


                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div>

                                    <h4 class="card-title mb-1">
                                        Student Attendance
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Update Present / Absent status.
                                    </p>

                                </div>


                                <button type="button"
                                    id="markAllPresent"
                                    class="btn btn-outline-success btn-rounded">

                                    <i class="mdi mdi-check-all"></i>

                                    Mark All Present

                                </button>

                            </div>


                            {{-- Students --}}

                            <div class="attendance-list">

                                @foreach ($attendanceSession->attendanceRecords as $index => $record)

                                    <div class="attendance-row">

                                        {{-- Number --}}

                                        <div class="student-number">

                                            {{ $index + 1 }}

                                        </div>


                                        {{-- Student --}}

                                        <div class="student-info">

                                            <div class="student-avatar">

                                                @if ($record->student->image)

                                                    <img
                                                        src="{{ asset($record->student->image) }}"
                                                        alt="{{ $record->student->name }}">

                                                @else

                                                    <div class="avatar-placeholder">

                                                        <i class="mdi mdi-account"></i>

                                                    </div>

                                                @endif

                                            </div>


                                            <div class="student-details">

                                                <h6>
                                                    {{ $record->student->name }}
                                                </h6>

                                                <small>
                                                    ID: {{ $record->student->student_id }}
                                                </small>

                                            </div>

                                        </div>


                                        {{-- Attendance --}}

                                        <div class="attendance-status">

                                            <label class="attendance-option present-option">

                                                <input type="radio"
                                                    name="attendance[{{ $record->student_id }}]"
                                                    value="Present"
                                                    {{ $record->status === 'Present' ? 'checked' : '' }}>

                                                <span>

                                                    <i class="mdi mdi-check"></i>

                                                    Present

                                                </span>

                                            </label>


                                            <label class="attendance-option absent-option">

                                                <input type="radio"
                                                    name="attendance[{{ $record->student_id }}]"
                                                    value="Absent"
                                                    {{ $record->status === 'Absent' ? 'checked' : '' }}>

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

                                    Update Attendance

                                </button>


                                <a href="{{ route('attendance-sessions.show', $attendanceSession->id) }}"
                                    class="btn btn-dark btn-lg">

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

        $('input[value="Present"]').prop('checked', true);

    });

</script>

@endsection