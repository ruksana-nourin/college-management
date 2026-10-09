@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="main-panel">

    <div class="content-wrapper">

        {{-- ==========================================
             PAGE HEADER
        =========================================== --}}

        <div class="page-header">

            <h3 class="page-title">
                Dashboard
            </h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Overview
                    </li>
                </ol>
            </nav>

        </div>


        {{-- ==========================================
             TOP STATISTICS
        =========================================== --}}

        <div class="row">


            {{-- Students --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    {{ $totalStudents }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Students
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-primary">
                                  <i class="mdi mdi-account-group"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Teachers --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    {{ $totalTeachers }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Teachers
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-success">

                                    <span class="mdi mdi-human-male-board icon-item"></span>
                                    <i class="mdi mdi-account-multiple"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Courses --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    {{ $totalCourses }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Courses
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-info">

                                    <span class="mdi mdi-book-open-page-variant icon-item"></span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Exams --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    {{ $totalExams }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Exams
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-warning">

                                    <span class="mdi mdi-file-document-edit icon-item"></span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Results --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    {{ $totalResults }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Results
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-danger">

                                    <span class="mdi mdi-chart-line icon-item"></span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Fees --}}
            <div class="col-xl-2 col-sm-4 col-6 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <h3 class="mb-0">
                                    ৳{{ number_format($totalFeePaid, 0) }}
                                </h3>

                                <h6 class="text-muted font-weight-normal">
                                    Fee Collected
                                </h6>

                            </div>

                            <div class="col-4">

                                <div class="icon icon-box-success">

                                    <span class="mdi mdi-cash-multiple icon-item"></span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ==========================================
             RECENT EXAMS + STUDENT SUMMARY
        =========================================== --}}

        <div class="row">


            {{-- Student Overview --}}
            <div class="col-md-4 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            Student Overview
                        </h4>

                        <div class="row mt-4">

                            <div class="col-6">

                                <div class="d-flex align-items-center">

                                    <div class="icon icon-box-primary mr-3">
                                        <span class="mdi mdi-account-group"></span>
                                    </div>

                                    <div>

                                        <h4 class="mb-0">
                                            {{ $totalStudents }}
                                        </h4>

                                        <p class="text-muted mb-0">
                                            Total Students
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="mt-4">

                            <div class="d-flex justify-content-between">

                                <span>
                                    Student Management
                                </span>

                                <span>
                                    {{ $totalStudents }}
                                </span>

                            </div>

                            <div class="progress progress-md mt-2">

                                <div
                                    class="progress-bar bg-primary"
                                    role="progressbar"
                                    style="width: 100%"
                                ></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Recent Exams --}}
            <div class="col-md-8 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <h4 class="card-title">
                                Recent Exams
                            </h4>

                            <a
                                href="{{ route('exams.index') }}"
                                class="text-primary"
                            >
                                View All
                            </a>

                        </div>


                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th>Exam</th>

                                        <th>Class</th>

                                        <th>Date</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($recentExams as $exam)

                                        <tr>

                                            <td>
                                                {{ $exam->name }}
                                            </td>

                                            <td>
                                                {{ $exam->academic_class }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($exam->exam_date)->format('d M Y') }}
                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td
                                                colspan="3"
                                                class="text-center text-muted"
                                            >
                                                No exams found.
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


        {{-- ==========================================
             RESULTS + FEE PAYMENTS
        =========================================== --}}

        <div class="row">


            {{-- Recent Results --}}
            <div class="col-md-7 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <h4 class="card-title">
                                Recent Results
                            </h4>

                            <a
                                href="{{ route('exam-results.index') }}"
                                class="text-primary"
                            >
                                View All
                            </a>

                        </div>


                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th>Student</th>

                                        <th>Exam</th>

                                        <th>Grade</th>

                                        <th>Point</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($recentResults as $result)

                                        <tr>

                                            <td>
                                                {{ $result->student }}
                                            </td>

                                            <td>
                                                {{ $result->exam }}
                                            </td>

                                            <td>

                                                <div class="badge badge-outline-success">
                                                    {{ $result->grade }}
                                                </div>

                                            </td>

                                            <td>
                                                {{ number_format($result->grade_point, 2) }}
                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td
                                                colspan="4"
                                                class="text-center text-muted"
                                            >
                                                No results found.
                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Fee Summary --}}
            <div class="col-md-5 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            Fee Overview
                        </h4>


                        <div class="text-center mt-4">

                            <div class="icon icon-box-success mx-auto">

                                <span class="mdi mdi-cash-multiple icon-item"></span>

                            </div>


                            <h2 class="mt-3 mb-1">
                                ৳{{ number_format($totalFeePaid, 2) }}
                            </h2>

                            <p class="text-muted">
                                Total Fee Collected
                            </p>

                        </div>


                        <div class="text-center mt-4">

                            <a
                                href="{{ route('fee-payments.index') }}"
                                class="btn btn-outline-success btn-rounded"
                            >
                                View Payments
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ==========================================
             RECENT PAYMENTS
        =========================================== --}}

        <div class="row">

            <div class="col-12 grid-margin">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <h4 class="card-title">
                                Recent Fee Payments
                            </h4>

                            <a
                                href="{{ route('fee-payments.index') }}"
                                class="text-primary"
                            >
                                View All
                            </a>

                        </div>


                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th>Receipt No</th>

                                        <th>Student</th>

                                        <th>Amount</th>

                                        <th>Payment Date</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($recentPayments as $payment)

                                        <tr>

                                            <td>
                                                {{ $payment->receipt_no }}
                                            </td>

                                            <td>
                                                {{ $payment->student }}
                                            </td>

                                            <td>
                                                ৳{{ number_format($payment->payment_amount, 2) }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}
                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td
                                                colspan="4"
                                                class="text-center text-muted"
                                            >
                                                No payments found.
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


        {{-- ==========================================
             QUICK ACTIONS
        =========================================== --}}

        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            Quick Actions
                        </h4>

                        <div class="d-flex flex-wrap">

                            <a
                                href="{{ route('students.create') }}"
                                class="btn btn-primary btn-rounded mr-2 mb-2"
                            >
                                <i class="mdi mdi-account-plus"></i>
                                Add Student
                            </a>


                            <a
                                href="{{ route('exams.create') }}"
                                class="btn btn-warning btn-rounded mr-2 mb-2"
                            >
                                <i class="mdi mdi-file-document-edit"></i>
                                Create Exam
                            </a>


                            <a
                                href="{{ route('exam-results.create') }}"
                                class="btn btn-success btn-rounded mr-2 mb-2"
                            >
                                <i class="mdi mdi-chart-line"></i>
                                Enter Result
                            </a>


                            <a
                                href="{{ route('fee-payments.create') }}"
                                class="btn btn-info btn-rounded mr-2 mb-2"
                            >
                                <i class="mdi mdi-cash"></i>
                                Fee Payment
                            </a>
                            <a
                                href="{{ route('attendance-sessions.create') }}"
                                class="btn btn-success btn-rounded mr-2 mb-2"
                            >
                                <i class="mdi mdi-account-box-multiple"></i>
                                Attendance
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  
@endsection