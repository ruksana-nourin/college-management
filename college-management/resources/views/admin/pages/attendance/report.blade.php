@extends('admin.layouts.master')

@section('title', 'Attendance Report')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">
                    Attendance Report
                </h3>
            </div>

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead
                                title="Attendance Report"
                                subtitle="Filter and view student attendance records."
                            >

                                <a href="{{ route('attendance-sessions.index') }}"
                                    class="btn btn-warning btn-rounded btn-fw">

                                    <i class="mdi mdi-arrow-left"></i>

                                    Attendance Sessions

                                </a>

                            </x-admin.phead>

                            {{-- Filter Form --}}

                            <form method="GET"
                                action="{{ route('attendance.report') }}">

                                <div class="row">

                                    {{-- Academic Session --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Academic Session</label>

                                        <select
                                            name="academic_session_id"
                                            id="academic_session_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach ($academicSessions as $session)

                                                <option
                                                    value="{{ $session->id }}"
                                                    {{ request('academic_session_id') == $session->id ? 'selected' : '' }}
                                                >

                                                    {{ $session->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- Semester --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Semester</label>

                                        <select
                                            name="semester_id"
                                            id="semester_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Semester
                                            </option>

                                        </select>

                                    </div>

                                    {{-- Course --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Course</label>

                                        <select
                                            name="course_id"
                                            id="course_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Course
                                            </option>

                                            @foreach ($courses as $course)

                                                <option
                                                    value="{{ $course->id }}"
                                                    {{ request('course_id') == $course->id ? 'selected' : '' }}
                                                >

                                                    {{ $course->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- Class --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Class</label>

                                        <select
                                            name="class_id"
                                            id="class_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Class
                                            </option>

                                        </select>

                                    </div>

                                    {{-- Section --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Section</label>

                                        <select
                                            name="section_id"
                                            id="section_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Section
                                            </option>

                                        </select>

                                    </div>

                                    {{-- Subject --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>Subject</label>

                                        <select
                                            name="subject_id"
                                            id="subject_id"
                                            class="form-control"
                                        >

                                            <option value="">
                                                Select Subject
                                            </option>

                                        </select>

                                    </div>

                                    {{-- Date --}}

                                    <div class="col-lg-4 col-md-6 col-12 mb-3">

                                        <label>
                                            Attendance Date
                                        </label>

                                        <input
                                            type="date"
                                            name="attendance_date"
                                            class="form-control"
                                            value="{{ request('attendance_date') }}"
                                        >

                                    </div>

                                </div>

                                <div class="mt-2">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="mdi mdi-magnify"></i>

                                        Generate Report

                                    </button>

                                    <a
                                        href="{{ route('attendance.report') }}"
                                        class="btn btn-dark"
                                    >

                                        <i class="mdi mdi-refresh"></i>

                                        Reset

                                    </a>

                                </div>

                            </form>

                            @if ($attendanceSessions->count())

                            {{-- Attendance Sessions Table --}}
    <div class="table-responsive mt-4">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Total</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Attendance</th>
                    <th class="text-center">Action</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($attendanceSessions as $index => $session)

                    @php

                        $total = $session->attendanceRecords->count();

                        $present = $session->attendanceRecords
                            ->where('status', 'Present')
                            ->count();

                        $absent = $session->attendanceRecords
                            ->where('status', 'Absent')
                            ->count();

                        $percentage = $total > 0
                            ? round(($present / $total) * 100, 2)
                            : 0;

                    @endphp


                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>


                        <td>
                            {{ \Carbon\Carbon::parse($session->attendance_date)->format('d M, Y') }}
                        </td>


                        <td>
                            {{ $session->subject->course->name ?? 'N/A' }}
                        </td>


                        <td>
                            {{ $session->academicClass->name ?? 'N/A' }}
                        </td>


                        <td>
                            {{ $session->section->name ?? 'N/A' }}
                        </td>


                        <td>
                            {{ $session->subject->name ?? 'N/A' }}
                        </td>


                        <td>
                            {{ $total }}
                        </td>


                        <td>
                            <span class="badge badge-success">
                                {{ $present }}
                            </span>
                        </td>


                        <td>
                            <span class="badge badge-danger">
                                {{ $absent }}
                            </span>
                        </td>


                        <td>

                            <span class="badge badge-info">

                                {{ $percentage }}%

                            </span>

                        </td>


                        <td class="text-center">

                            <a href="{{ route(
                                'attendance-sessions.show',
                                $session->id
                            ) }}"
                                class="btn btn-sm btn-outline-info">

                                <i class="mdi mdi-eye"></i>

                            </a>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@elseif (request()->hasAny([
    'academic_session_id',
    'semester_id',
    'course_id',
    'class_id',
    'section_id',
    'subject_id',
    'attendance_date'
]))

    <div class="alert alert-warning mt-4">

        <i class="mdi mdi-alert-circle"></i>

        No attendance records found for the selected filters.

    </div>

@endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

<script>

    // ==========================================
    // COURSE → CLASS + SUBJECT
    // ==========================================

    $('#course_id').on('change', function () {

        let courseId = $(this).val();

        let classDropdown = $('#class_id');
        let subjectDropdown = $('#subject_id');
        let sectionDropdown = $('#section_id');


        // Clear Class
        classDropdown.empty();

        classDropdown.append(
            '<option value="">Select Class</option>'
        );


        // Clear Subject
        subjectDropdown.empty();

        subjectDropdown.append(
            '<option value="">Select Subject</option>'
        );


        // Clear Section
        sectionDropdown.empty();

        sectionDropdown.append(
            '<option value="">Select Section</option>'
        );


        if (!courseId) {
            return;
        }


        // ==========================================
        // Load Classes
        // ==========================================

        $.ajax({

            url: "{{ url('courses') }}/" + courseId + "/classes",

            type: "GET",

            success: function (classes) {

                $.each(classes, function (index, item) {

                    classDropdown.append(
                        `<option value="${item.id}">
                            ${item.name}
                        </option>`
                    );

                });

            },

            error: function () {

                console.log('Unable to load classes.');

            }

        });


        // ==========================================
        // Load Subjects
        // ==========================================

        $.ajax({

            url: "{{ url('courses') }}/" + courseId + "/subjects",

            type: "GET",

            success: function (subjects) {

                $.each(subjects, function (index, subject) {

                    subjectDropdown.append(
                        `<option value="${subject.id}">
                            ${subject.name}
                        </option>`
                    );

                });

            },

            error: function () {

                console.log('Unable to load subjects.');

            }

        });

    });


    // ==========================================
    // CLASS → SECTION
    // ==========================================

    $('#class_id').on('change', function () {

        let classId = $(this).val();

        let sectionDropdown = $('#section_id');


        // Clear Section
        sectionDropdown.empty();

        sectionDropdown.append(
            '<option value="">Select Section</option>'
        );


        if (!classId) {
            return;
        }


        $.ajax({

            url: "{{ url('classes') }}/" + classId + "/sections",

            type: "GET",

            success: function (sections) {

                $.each(sections, function (index, section) {

                    sectionDropdown.append(
                        `<option value="${section.id}">
                            ${section.name}
                        </option>`
                    );

                });

            },

            error: function () {

                console.log('Unable to load sections.');

            }

        });

    });

    // ==========================================
// ACADEMIC SESSION → SEMESTER
// ==========================================

$('#academic_session_id').on('change', function () {

    let sessionId = $(this).val();

    let semesterDropdown = $('#semester_id');


    // Clear Semester
    semesterDropdown.empty();

    semesterDropdown.append(
        '<option value="">Select Semester</option>'
    );


    if (!sessionId) {
        return;
    }


    $.ajax({

        url: "{{ url('academic-sessions') }}/" + sessionId + "/semesters",

        type: "GET",

        success: function (semesters) {

            $.each(semesters, function (index, semester) {

                semesterDropdown.append(
                    `<option value="${semester.id}">
                        ${semester.name}
                    </option>`
                );

            });

        },

        error: function () {

            console.log('Unable to load semesters.');

        }

    });

});
</script>

@endsection