@extends('admin.layouts.master')

@section('title', 'Exam Result - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <style>
        /* =========================================
           PRINT REPORT
        ========================================= */

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
                min-height: 100vh;
                background: #fff !important;
                color: #000 !important;
                font-family: Arial, Helvetica, sans-serif;
            }

            html,
            body {
                width: 100%;
                height: auto;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
            }

            /* Report Header */
            .print-header {
                text-align: center;
                border-bottom: 2px solid #000;
                padding-bottom: 12px;
                margin-bottom: 20px;
            }

            .print-header h2 {
                margin: 0;
                font-size: 24px;
                font-weight: 700;
            }

            .print-header h4 {
                margin: 6px 0;
                font-size: 17px;
                font-weight: 600;
            }

            .print-header p {
                margin: 0;
                font-size: 14px;
            }

            /* Student Information */
            .print-info-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 25px;
            }

            .print-info-table td {
                border: 1px solid #999;
                padding: 9px 10px;
                font-size: 13px;
            }

            .print-info-table td:nth-child(odd) {
                width: 18%;
                font-weight: 700;
                background: #f2f2f2 !important;
            }

            .print-info-table td:nth-child(even) {
                width: 32%;
            }

            /* Section Title */
            .print-section-title {
                font-size: 15px;
                font-weight: 700;
                margin-bottom: 8px;
                padding-bottom: 5px;
                border-bottom: 1px solid #000;
            }

            /* Result Table */
            .print-result-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .print-result-table th,
            .print-result-table td {
                border: 1px solid #999;
                padding: 9px 8px;
                font-size: 12px;
                text-align: center;
            }

            .print-result-table th {
                background: #e9e9e9 !important;
                font-weight: 700;
            }

            .print-result-table td:nth-child(2) {
                text-align: left;
            }

            .print-result-table tfoot td {
                font-weight: 700;
                background: #f2f2f2 !important;
            }

            /* Summary */
            .print-summary {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
                margin-bottom: 25px;
            }

            .print-summary td {
                border: 1px solid #999;
                padding: 10px;
                text-align: center;
            }

            .print-summary .summary-label {
                display: block;
                font-size: 11px;
                font-weight: 600;
                margin-bottom: 4px;
            }

            .print-summary .summary-value {
                display: block;
                font-size: 16px;
                font-weight: 700;
            }

            /* Overall Result */
            .print-overall {
                text-align: center;
                border: 2px solid #000;
                padding: 12px;
                margin-top: 10px;
                margin-bottom: 45px;
            }

            .print-overall h4 {
                margin: 0 0 6px;
                font-size: 15px;
            }

            .print-overall strong {
                font-size: 18px;
            }

            /* Signatures */
            .print-signatures {
                display: flex;
                justify-content: space-between;
                margin-top: 70px;
            }

            .print-signature {
                width: 180px;
                text-align: center;
                font-size: 12px;
            }

            .print-signature-line {
                border-top: 1px solid #000;
                margin-bottom: 6px;
            }

            /* Footer */
            .print-footer {
                text-align: center;
                font-size: 10px;
                margin-top: 35px;
                color: #555 !important;
            }
        }
    </style>
@endsection


@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Exam Result Details</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead
                                title="Exam Result Details"
                                subtitle="View student examination result from here."
                            >
                                <a
                                    href="{{ route('exam-results.index') }}"
                                    class="btn btn-warning btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back to Results
                                </a>
                            </x-admin.phead>


                            {{-- Student & Exam Information --}}
                            <div class="user-profile mb-4">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="user-info-box">

                                            <span class="info-label">
                                                Student
                                            </span>

                                            <h4 class="info-value">
                                                {{ $result->student_name }}
                                            </h4>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="user-info-box">

                                            <span class="info-label">
                                                Student ID
                                            </span>

                                            <h4 class="info-value">
                                                {{ $result->student_code }}
                                            </h4>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="user-info-box">

                                            <span class="info-label">
                                                Exam
                                            </span>

                                            <h4 class="info-value">
                                                {{ $result->exam }}
                                            </h4>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="user-info-box">

                                            <span class="info-label">
                                                Exam Date
                                            </span>

                                            <h4 class="info-value">
                                                {{ $result->exam_date }}
                                            </h4>

                                        </div>
                                    </div>

                                </div>

                            </div>


                            {{-- Subject Results --}}
                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Full Marks</th>
                                            <th>Obtained Marks</th>
                                            <th>Grade</th>
                                            <th>Grade Point</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($details as $detail)

                                            <tr>

                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>
                                                    {{ $detail->subject }}
                                                </td>

                                                <td>
                                                    {{ $detail->full_marks }}
                                                </td>

                                                <td>
                                                    {{ $detail->obtained_marks }}
                                                </td>

                                                <td>
                                                    <span class="badge badge-success">
                                                        {{ $detail->grade }}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{ number_format($detail->grade_point, 2) }}
                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No subject results found.
                                                </td>
                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>


                            {{-- Overall Result --}}
                            <div class="row mt-4">

                                <div class="col-md-4">
                                    <div class="user-info-box">

                                        <span class="info-label">
                                            Total Marks
                                        </span>

                                        <h4 class="info-value">
                                            {{ $result->total_marks }}
                                        </h4>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="user-info-box">

                                        <span class="info-label">
                                            Total Obtained
                                        </span>

                                        <h4 class="info-value">
                                            {{ $result->total_obtained }}
                                        </h4>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="user-info-box">

                                        <span class="info-label">
                                            Overall Grade
                                        </span>

                                        <h4 class="info-value">
                                            {{ $result->grade }}
                                        </h4>

                                    </div>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <div class="user-info-box">

                                        <span class="info-label">
                                            Overall Grade Point
                                        </span>

                                        <h4 class="info-value">
                                            {{ number_format($result->grade_point, 2) }}
                                        </h4>

                                    </div>
                                </div>

                            </div>


                            {{-- Actions --}}
                            <div class="text-right mt-4 no-print">

                                <a
                                    href="{{ route('exam-results.edit', $result->id) }}"
                                    class="btn btn-primary btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-pencil"></i>
                                    Edit Result
                                </a>

                                <button
                                    type="button"
                                    class="btn btn-success btn-rounded no-print"
                                    onclick="window.print()"
                                >
                                    <i class="mdi mdi-printer"></i>
                                    Print Marksheet
                                </button>

                                <a
                                    href="{{ route('exam-results.index') }}"
                                    class="btn btn-dark btn-rounded btn-fw"
                                >
                                    Back to Results
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    {{-- =====================================================
         PRINT ONLY REPORT
    ====================================================== --}}

    <div class="print-report">

        {{-- Header --}}
        <div class="print-header">

            <h2>
                College Management System
            </h2>

            <h4>
                Student Result Report
            </h4>

            <p>
                {{ $result->exam }}
            </p>

        </div>


        {{-- Student Information --}}
        <table class="print-info-table">

            <tr>
                <td>Student Name</td>
                <td>{{ $result->student_name }}</td>

                <td>Student ID</td>
                <td>{{ $result->student_code }}</td>
            </tr>

            <tr>
                <td>Examination</td>
                <td>{{ $result->exam }}</td>

                <td>Exam Date</td>
                <td>{{ $result->exam_date }}</td>
            </tr>

        </table>


        {{-- Subject Result --}}
        <div class="print-section-title">
            Subject-wise Result
        </div>


        <table class="print-result-table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Full Marks</th>
                    <th>Obtained Marks</th>
                    <th>Grade</th>
                    <th>Grade Point</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($details as $detail)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $detail->subject }}
                        </td>

                        <td>
                            {{ number_format($detail->full_marks, 2) }}
                        </td>

                        <td>
                            {{ number_format($detail->obtained_marks, 2) }}
                        </td>

                        <td>
                            {{ $detail->grade }}
                        </td>

                        <td>
                            {{ number_format($detail->grade_point, 2) }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">
                            No subject results found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

            <tfoot>

                <tr>

                    <td colspan="2">
                        Total
                    </td>

                    <td>
                        {{ number_format($result->total_marks, 2) }}
                    </td>

                    <td>
                        {{ number_format($result->total_obtained, 2) }}
                    </td>

                    <td>
                        {{ $result->grade }}
                    </td>

                    <td>
                        {{ number_format($result->grade_point, 2) }}
                    </td>

                </tr>

            </tfoot>

        </table>


        {{-- Summary --}}
        <table class="print-summary">

            <tr>

                <td>
                    <span class="summary-label">
                        Total Marks
                    </span>

                    <span class="summary-value">
                        {{ number_format($result->total_marks, 2) }}
                    </span>
                </td>

                <td>
                    <span class="summary-label">
                        Total Obtained
                    </span>

                    <span class="summary-value">
                        {{ number_format($result->total_obtained, 2) }}
                    </span>
                </td>

                <td>
                    <span class="summary-label">
                        Grade
                    </span>

                    <span class="summary-value">
                        {{ $result->grade }}
                    </span>
                </td>

                <td>
                    <span class="summary-label">
                        Grade Point
                    </span>

                    <span class="summary-value">
                        {{ number_format($result->grade_point, 2) }}
                    </span>
                </td>

            </tr>

        </table>


        {{-- Overall Result --}}
        <div class="print-overall">

            <h4>
                Overall Result
            </h4>

            <strong>

                @if ($result->grade == 'F')
                    FAILED
                @else
                    PASSED
                @endif

                &nbsp; | &nbsp;

                {{ $result->grade }}

                &nbsp; | &nbsp;

                {{ number_format($result->grade_point, 2) }}

            </strong>

        </div>


        {{-- Signatures --}}
        <div class="print-signatures">

            <div class="print-signature">

                <div class="print-signature-line"></div>

                Class Teacher

            </div>


            <div class="print-signature">

                <div class="print-signature-line"></div>

                Principal

            </div>

        </div>


        {{-- Footer --}}
        <div class="print-footer">

            This is a computer generated result report.

        </div>

    </div>

@endsection