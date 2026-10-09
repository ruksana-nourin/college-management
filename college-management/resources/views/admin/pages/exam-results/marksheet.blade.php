@extends('admin.layouts.master')

@section('title', 'Result Marksheet')

@section('content')

    <div class="container-fluid">

        {{-- Screen Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">

            <div>
                <h4 class="mb-1">
                    Result Marksheet
                </h4>

                <small>
                    Student examination result
                </small>
            </div>

            <div>

                <a
                    href="{{ route('exam-results.show', $result->id) }}"
                    class="btn btn-secondary"
                >
                    <i class="mdi mdi-arrow-left"></i>
                    Back
                </a>

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="window.print()"
                >
                    <i class="mdi mdi-printer"></i>
                    Print Marksheet
                </button>

            </div>

        </div>


        {{-- Marksheet --}}
        <div class="card marksheet-card">

            <div class="card-body">


                {{-- College Header --}}
                <div class="text-center mb-4">

                    <h2 class="mb-1">
                        College Management System
                    </h2>

                    <p class="mb-1">
                        Student Result Marksheet
                    </p>

                    <h4 class="mt-3">
                        {{ $result->exam }}
                    </h4>

                </div>


                <hr>


                {{-- Student Information --}}
                <div class="row mb-4">

                    <div class="col-md-8">

                        <table class="table table-borderless mb-0">

                            <tr>
                                <th width="150">
                                    Student Name
                                </th>

                                <td>
                                    {{ $result->student_name }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Student ID
                                </th>

                                <td>
                                    {{ $result->student_code }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Examination
                                </th>

                                <td>
                                    {{ $result->exam }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Exam Date
                                </th>

                                <td>
                                    {{ \Carbon\Carbon::parse($result->exam_date)->format('d M Y') }}
                                </td>
                            </tr>

                        </table>

                    </div>


                    {{-- Student Image --}}
                    <div class="col-md-4 text-end">

                        @if($result->image)

                            <img
                                src="{{ asset($result->image) }}"
                                alt="{{ $result->student_name }}"
                                class="student-photo"
                            >

                        @else

                            <div class="student-photo-placeholder">
                                <i class="mdi mdi-account"></i>
                            </div>

                        @endif

                    </div>

                </div>


                {{-- Subject Result --}}
                <div class="table-responsive">

                    <table class="table table-bordered marksheet-table">

                        <thead>

                            <tr>

                                <th width="60">
                                    #
                                </th>

                                <th>
                                    Subject
                                </th>

                                <th width="130">
                                    Full Marks
                                </th>

                                <th width="150">
                                    Obtained Marks
                                </th>

                                <th width="100">
                                    Grade
                                </th>

                                <th width="120">
                                    Grade Point
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($details as $index => $detail)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
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

                            @endforeach

                        </tbody>


                        <tfoot>

                            <tr>

                                <th colspan="2" class="text-end">
                                    Total
                                </th>

                                <th>
                                    {{ number_format($result->total_marks, 2) }}
                                </th>

                                <th>
                                    {{ number_format($result->total_obtained, 2) }}
                                </th>

                                <th>
                                    {{ $result->grade }}
                                </th>

                                <th>
                                    {{ number_format($result->grade_point, 2) }}
                                </th>

                            </tr>

                        </tfoot>

                    </table>

                </div>


                {{-- Overall Result --}}
                <div class="row mt-4">

                    <div class="col-md-4">

                        <div class="result-summary">

                            <span>
                                Total Marks
                            </span>

                            <strong>
                                {{ number_format($result->total_marks, 2) }}
                            </strong>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="result-summary">

                            <span>
                                Total Obtained
                            </span>

                            <strong>
                                {{ number_format($result->total_obtained, 2) }}
                            </strong>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="result-summary">

                            <span>
                                Overall Grade
                            </span>

                            <strong>
                                {{ $result->grade }}
                                /
                                {{ number_format($result->grade_point, 2) }}
                            </strong>

                        </div>

                    </div>

                </div>


                {{-- Signature --}}
                <div class="row signature-section">

                    <div class="col-md-6">

                        <div class="signature-line">
                        </div>

                        <p>
                            Class Teacher
                        </p>

                    </div>


                    <div class="col-md-6 text-end">

                        <div class="signature-line ms-auto">
                        </div>

                        <p>
                            Principal
                        </p>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="text-center mt-4">

                    <small>
                        This is a computer generated marksheet.
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- Print CSS --}}
    <style>

        .marksheet-card {
            max-width: 1000px;
            margin: 0 auto;
        }

        .student-photo {
            width: 110px;
            height: 130px;
            object-fit: cover;
            border: 1px solid #ddd;
            padding: 4px;
        }

        .student-photo-placeholder {
            width: 110px;
            height: 130px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            font-size: 50px;
        }

        .marksheet-table th,
        .marksheet-table td {
            vertical-align: middle;
        }

        .result-summary {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        .result-summary span {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .result-summary strong {
            display: block;
            font-size: 20px;
        }

        .signature-section {
            margin-top: 80px;
        }

        .signature-line {
            width: 180px;
            border-top: 1px solid #000;
            margin-bottom: 8px;
        }


        @media print {

            @page {
                size: A4;
                margin: 15mm;
            }

            body {
                background: #fff !important;
            }

            .no-print,
            .navbar,
            .sidebar,
            .footer {
                display: none !important;
            }

            .container-fluid {
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .marksheet-card {
                max-width: 100% !important;
                margin: 0 !important;
                border: none !important;
                box-shadow: none !important;
            }

            .card-body {
                padding: 0 !important;
            }

            .marksheet-table {
                width: 100% !important;
            }

            .marksheet-table th,
            .marksheet-table td {
                color: #000 !important;
                border-color: #000 !important;
            }

            .result-summary {
                border-color: #000 !important;
            }

            .result-summary span,
            .result-summary strong {
                color: #000 !important;
            }

            .student-photo {
                border-color: #000 !important;
            }

        }

    </style>

@endsection