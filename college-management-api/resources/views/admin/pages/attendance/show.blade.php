@extends('admin.layouts.master')

@section('title', 'Attendance Details')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">
            {{-- Attendance Summary --}}

            <div class="row mb-4">

                {{-- Total Students --}}
                <div class="col-lg-3 col-md-6 col-12 mb-3">

                    <div class="attendance-summary-card">

                        <div class="summary-icon total">
                            <i class="mdi mdi-account-group"></i>
                        </div>

                        <div>
                            <small>Total Students</small>

                            <h3>
                                {{ $totalStudents }}
                            </h3>
                        </div>

                    </div>

                </div>


                {{-- Present --}}
                <div class="col-lg-3 col-md-6 col-12 mb-3">

                    <div class="attendance-summary-card">

                        <div class="summary-icon present">
                            <i class="mdi mdi-check-circle"></i>
                        </div>

                        <div>
                            <small>Present</small>

                            <h3>
                                {{ $presentStudents }}
                            </h3>
                        </div>

                    </div>

                </div>


                {{-- Absent --}}
                <div class="col-lg-3 col-md-6 col-12 mb-3">

                    <div class="attendance-summary-card">

                        <div class="summary-icon absent">
                            <i class="mdi mdi-close-circle"></i>
                        </div>

                        <div>
                            <small>Absent</small>

                            <h3>
                                {{ $absentStudents }}
                            </h3>
                        </div>

                    </div>

                </div>


                {{-- Percentage --}}
                <div class="col-lg-3 col-md-6 col-12 mb-3">

                    <div class="attendance-summary-card">

                        <div class="summary-icon percentage">
                            <i class="mdi mdi-chart-line"></i>
                        </div>

                        <div>
                            <small>Attendance</small>

                            <h3>
                                {{ $attendancePercentage }}%
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

            <div class="page-header">
                <h3 class="page-title">
                    Attendance Details
                </h3>
            </div>


            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">
                            <x-admin.phead title="Attendance Details"
                                subtitle="View attendance information and student attendance." >

                                <button type="button" onclick="window.print()" class="btn btn-success btn-rounded btn-fw">

                                    <i class="mdi mdi-printer"></i>

                                    Print Attendance

                                </button>


                                <a href="{{ route('attendance-sessions.edit', $attendanceSession->id) }}"
                                    class="btn btn-primary btn-rounded btn-fw">

                                    <i class="mdi mdi-pencil"></i>

                                    Edit Attendance

                                </a>


                                <a href="{{ route('attendance-sessions.index') }}"
                                    class="btn btn-warning btn-rounded btn-fw">

                                    <i class="mdi mdi-arrow-left"></i>

                                    Back to Attendance

                                </a>

                            </x-admin.phead>



                            <div class="print-header">

                                <h2>College Management System</h2>

                                <h4>Attendance Report</h4>

                                <p>
                                    {{ $attendanceSession->subject->course->name ?? 'N/A' }}
                                    -
                                    {{ $attendanceSession->academicClass->name ?? 'N/A' }}
                                    -
                                    {{ $attendanceSession->section->name ?? 'N/A' }}
                                </p>

                            </div>

                            {{-- Session Information --}}

                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Course</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->subject->course->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Subject</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->subject->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Teacher</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->teacher->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Class</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->academicClass->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Section</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->section->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Attendance Date</label>

                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($attendanceSession->attendance_date)->format('d M, Y') }}"
                                        readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Academic Session</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->academicSession->name ?? 'N/A' }}" readonly>

                                </div>


                                <div class="col-lg-4 col-md-6 col-12 mb-3">

                                    <label>Semester</label>

                                    <input type="text" class="form-control"
                                        value="{{ $attendanceSession->semester->name ?? 'N/A' }}" readonly>

                                </div>

                            </div>


                            <hr class="my-4">


                            {{-- Student Attendance --}}

                            <h4 class="card-title">
                                Student Attendance
                            </h4>


                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Student</th>

                                            <th>Student ID</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($attendanceSession->attendanceRecords as $index => $record)

                                            <tr>

                                                <td>
                                                    {{ $index + 1 }}
                                                </td>


                                                <td>

                                                    <div class="d-flex align-items-center">

                                                        @if ($record->student->image)

                                                            <img src="{{ asset($record->student->image) }}" width="40" height="40"
                                                                class="rounded-circle mr-2" alt="{{ $record->student->name }}">

                                                        @endif


                                                        <span>
                                                            {{ $record->student->name }}
                                                        </span>

                                                    </div>

                                                </td>


                                                <td>
                                                    {{ $record->student->student_id }}
                                                </td>


                                                <td>

                                                    @if ($record->status === 'Present')

                                                        <span class="badge badge-success">
                                                            <i class="mdi mdi-check"></i>
                                                            Present
                                                        </span>

                                                    @else

                                                        <span class="badge badge-danger">
                                                            <i class="mdi mdi-close"></i>
                                                            Absent
                                                        </span>

                                                    @endif

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="4" class="text-center">

                                                    No attendance records found.

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

 
{{-- ============================= --}}
{{-- PRINT ONLY ATTENDANCE REPORT --}}
{{-- ============================= --}}

<div class="print-report">

    <div class="print-header">

        <h2>College Management System</h2>

        <h4>Student Attendance Report</h4>

        <p>
            {{ $attendanceSession->subject->course->name ?? 'N/A' }}
            -
            {{ $attendanceSession->academicClass->name ?? 'N/A' }}
            -
            {{ $attendanceSession->section->name ?? 'N/A' }}
        </p>

    </div>


    {{-- Attendance Information --}}

    <table class="print-info-table">

        <tr>

            <td>
                <strong>Course</strong>
            </td>

            <td>
                {{ $attendanceSession->subject->course->name ?? 'N/A' }}
            </td>

            <td>
                <strong>Subject</strong>
            </td>

            <td>
                {{ $attendanceSession->subject->name ?? 'N/A' }}
            </td>

        </tr>


        <tr>

            <td>
                <strong>Class</strong>
            </td>

            <td>
                {{ $attendanceSession->academicClass->name ?? 'N/A' }}
            </td>

            <td>
                <strong>Section</strong>
            </td>

            <td>
                {{ $attendanceSession->section->name ?? 'N/A' }}
            </td>

        </tr>


        <tr>

            <td>
                <strong>Teacher</strong>
            </td>

            <td>
                {{ $attendanceSession->teacher->name ?? 'N/A' }}
            </td>

            <td>
                <strong>Date</strong>
            </td>

            <td>
                {{ \Carbon\Carbon::parse($attendanceSession->attendance_date)->format('d M, Y') }}
            </td>

        </tr>


        <tr>

            <td>
                <strong>Academic Session</strong>
            </td>

            <td>
                {{ $attendanceSession->academicSession->name ?? 'N/A' }}
            </td>

            <td>
                <strong>Semester</strong>
            </td>

            <td>
                {{ $attendanceSession->semester->name ?? 'N/A' }}
            </td>

        </tr>

    </table>


    {{-- Summary --}}

    <table class="print-summary-table">

        <tr>

            <td>
                <strong>Total Students</strong>
                <br>
                {{ $totalStudents }}
            </td>

            <td>
                <strong>Present</strong>
                <br>
                {{ $presentStudents }}
            </td>

            <td>
                <strong>Absent</strong>
                <br>
                {{ $absentStudents }}
            </td>

            <td>
                <strong>Attendance</strong>
                <br>
                {{ $attendancePercentage }}%
            </td>

        </tr>

    </table>


    {{-- Student Attendance --}}

    <h4 class="student-title">
        Student Attendance
    </h4>


    <table class="student-attendance-table">

        <thead>

            <tr>

                <th>#</th>

                <th>Student ID</th>

                <th>Student Name</th>

                <th>Status</th>

            </tr>

        </thead>


        <tbody>

            @foreach ($attendanceSession->attendanceRecords as $index => $record)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $record->student->student_id ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $record->student->name ?? 'N/A' }}
                    </td>

                    <td>

                        {{ $record->status }}

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>


    {{-- Signature --}}

    <div class="signature-area">

        <div>
            ______________________
            <br>
            Class Teacher
        </div>

        <div>
            ______________________
            <br>
            Authorized Signature
        </div>

    </div>

</div>

@endsection

@section('styles')

<style>

    /* ==========================
       PRINT REPORT
    ========================== */

    .print-report {
        display: none;
    }


    @media print {

        @page {
            size: A4;
            margin: 15mm;
        }


        /* Hide everything */

        body * {
            visibility: hidden !important;
        }


        /* Show only print report */

        .print-report,
        .print-report * {
            visibility: visible !important;
        }


        .print-report {
            display: block !important;

            position: absolute;

            left: 0;
            top: 0;

            width: 100%;

            background: #fff;

            color: #000;
        }


        /* Remove admin layout spacing */

        html,
        body {
            width: 100%;
            height: auto;

            margin: 0 !important;
            padding: 0 !important;

            background: #fff !important;
        }


        .main-panel,
        .content-wrapper,
        .container,
        .card,
        .card-body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;

            border: none !important;
            box-shadow: none !important;
        }


        /* ==========================
           HEADER
        ========================== */

        .print-header {
            text-align: center;

            margin-bottom: 20px;

            border-bottom: 2px solid #000;

            padding-bottom: 12px;
        }


        .print-header h2 {
            margin: 0;

            font-size: 22px;

            font-weight: 700;
        }


        .print-header h4 {
            margin: 5px 0;

            font-size: 16px;

            font-weight: 600;
        }


        .print-header p {
            margin: 0;

            font-size: 12px;
        }


        /* ==========================
           INFORMATION TABLE
        ========================== */

        .print-info-table {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 15px;

            font-size: 12px;
        }


        .print-info-table td {
            border: 1px solid #444;

            padding: 7px 9px;
        }


        .print-info-table td:nth-child(odd) {
            width: 15%;

            font-weight: 600;

            background: #f2f2f2;
        }


        .print-info-table td:nth-child(even) {
            width: 35%;
        }


        /* ==========================
           SUMMARY
        ========================== */

        .print-summary-table {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 20px;

            text-align: center;

            font-size: 12px;
        }


        .print-summary-table td {
            border: 1px solid #444;

            padding: 8px;
        }


        .print-summary-table strong {
            font-size: 11px;
        }


        .print-summary-table br + * {
            font-size: 14px;
        }


        /* ==========================
           STUDENT TABLE
        ========================== */

        .student-title {
            margin: 10px 0;

            font-size: 15px;

            font-weight: 600;
        }


        .student-attendance-table {
            width: 100%;

            border-collapse: collapse;

            font-size: 12px;
        }


        .student-attendance-table th,
        .student-attendance-table td {

            border: 1px solid #444;

            padding: 7px 8px;

            text-align: left;
        }


        .student-attendance-table th {

            background: #e9e9e9;

            font-weight: 700;
        }


        .student-attendance-table th:first-child,
        .student-attendance-table td:first-child {

            width: 7%;

            text-align: center;
        }


        .student-attendance-table th:nth-child(2),
        .student-attendance-table td:nth-child(2) {

            width: 20%;
        }


        .student-attendance-table th:last-child,
        .student-attendance-table td:last-child {

            width: 18%;

            text-align: center;
        }


        /* Don't break student rows */

        .student-attendance-table tr {

            page-break-inside: avoid;
        }


        /* ==========================
           SIGNATURE
        ========================== */

        .signature-area {

            display: flex;

            justify-content: space-between;

            margin-top: 60px;

            font-size: 12px;

            text-align: center;
        }


        .signature-area > div {

            width: 200px;
        }


        /* Prevent unnecessary page breaks */

        .print-info-table,
        .print-summary-table,
        .student-attendance-table {

            page-break-inside: auto;
        }
        .phead-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

    }

</style>

@endsection