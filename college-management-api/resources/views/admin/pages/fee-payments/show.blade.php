@extends('admin.layouts.master')

@section('title', 'Fee Payments - Details')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">

                <h3 class="page-title">
                    Fee Payment Details
                </h3>

                
            </div>


            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead title="Fee Payment Details" subtitle="View payment information from here.">



                                <a href="{{ route('fee-payments.index') }}" class="btn btn-warning">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back
                                </a>

                            </x-admin.phead>


                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Receipt No</label>

                                        <input type="text" class="form-control" value="{{ $feePayment->receipt_no }}"
                                            readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Payment Date</label>

                                        <input type="text" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($feePayment->payment_date)->format('d M, Y') }}"
                                            readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Student</label>

                                        <input type="text" class="form-control"
                                            value="{{ $feePayment->student->student_id }} - {{ $feePayment->student->name }}"
                                            readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Academic Session</label>

                                        <input type="text" class="form-control"
                                            value="{{ $feePayment->academicSession->name }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Semester</label>

                                        <input type="text" class="form-control" value="{{ $feePayment->semester->name }}"
                                            readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Total Amount</label>

                                        <input type="text" class="form-control"
                                            value="৳{{ number_format($feePayment->total_amount, 2) }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Previous Paid</label>

                                        <input type="text" class="form-control"
                                            value="৳{{ number_format($feePayment->total_amount - $feePayment->payment_amount - $feePayment->due_amount, 2) }}"
                                            readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Payment Amount</label>

                                        <input type="text" class="form-control"
                                            value="৳{{ number_format($feePayment->payment_amount, 2) }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Due Amount</label>

                                        <input type="text" class="form-control"
                                            value="৳{{ number_format($feePayment->due_amount, 2) }}" readonly>

                                    </div>

                                </div>


                            </div>



                            {{-- Fee Payment Details --}}

                            @if ($feePayment->details->count())

                                <div class="row">

                                    <div class="col-md-12">

                                        <h4 class="card-title mt-4">
                                            Payment Details
                                        </h4>

                                        <div class="table-responsive">

                                            <table class="table">

                                                <thead>

                                                    <tr>

                                                        <th>
                                                            Fee Category
                                                        </th>

                                                        <th>
                                                            Amount
                                                        </th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    @foreach ($feePayment->details as $detail)
                                                        <tr>

                                                            <td>
                                                                {{ $detail->feeCategory->name }}
                                                            </td>

                                                            <td>
                                                                ৳{{ number_format($detail->amount, 2) }}
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <a href="{{ route('fee-payments.print', $feePayment->id) }}" class="btn btn-danger" target="_blank">
                <i class="mdi mdi-printer"></i>
                Print Receipt
            </a>
        </div>

    </div>

@endsection
