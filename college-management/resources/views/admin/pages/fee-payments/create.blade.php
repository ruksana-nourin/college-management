@extends('admin.layouts.master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Create Fee Payment</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Add Fee Payment" subtitle="Add a new fee payment from here.">
                                <a href="{{ route('fee-payments.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back to Fee Payments
                                </a>
                            </x-admin.phead>

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('fee-payments.store') }}" method="POST">
                                @csrf

                                <div class="row">

                                    {{-- Student --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="student_id">Student</label>

                                        <select name="student_id" id="student_id" class="form-control">
                                            <option value="">Select Student</option>

                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}"
                                                    data-session="{{ $student->academic_session_id }}"
                                                    {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                                    {{ $student->student_id }} - {{ $student->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-admin.error-msg name="student_id" />
                                    </div>


                                    {{-- Academic Session --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="academic_session_id">Academic Session</label>

                                        <select name="academic_session_id"
                                            id="academic_session_id"
                                            class="form-control">

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach ($academicSessions as $academicSession)
                                                <option value="{{ $academicSession->id }}"
                                                    {{ old('academic_session_id') == $academicSession->id ? 'selected' : '' }}>
                                                    {{ $academicSession->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-admin.error-msg name="academic_session_id" />
                                    </div>


                                    {{-- Semester --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="semester_id">Semester</label>

                                        <select name="semester_id"
                                            id="semester_id"
                                            class="form-control">

                                            <option value="">
                                                Select Semester
                                            </option>

                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}"
                                                    data-session="{{ $semester->academic_session_id }}"
                                                    {{ old('semester_id') == $semester->id ? 'selected' : '' }}>
                                                    {{ $semester->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-admin.error-msg name="semester_id" />
                                    </div>


                                    {{-- Fee Structure --}}
                                    <div class="form-group col-12">

                                        <label>Fee Structure</label>

                                        <div id="fee-structure-container">

                                            <div class="alert alert-info mb-0">
                                                Please select a semester to view the fee structure.
                                            </div>

                                        </div>

                                    </div>


                                    {{-- Total Amount --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="total_amount">Total Amount</label>

                                        <input type="number"
                                            step="0.01"
                                            class="form-control"
                                            id="total_amount"
                                            name="total_amount"
                                            value="{{ old('total_amount') }}"
                                            readonly>

                                        <x-admin.error-msg name="total_amount" />
                                    </div>


                                    {{-- Previous Paid --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="previous_paid">Previous Paid</label>

                                        <input type="number"
                                            step="0.01"
                                            class="form-control"
                                            id="previous_paid"
                                            value="0"
                                            readonly>
                                    </div>


                                    {{-- Payment Amount --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="payment_amount">Payment Amount</label>

                                        <input type="number"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            name="payment_amount"
                                            id="payment_amount"
                                            placeholder="Payment amount"
                                            value="{{ old('payment_amount') }}">

                                        <x-admin.error-msg name="payment_amount" />
                                    </div>


                                    {{-- Due Amount --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="due_amount">Due Amount</label>

                                        <input type="number"
                                            step="0.01"
                                            class="form-control"
                                            name="due_amount"
                                            id="due_amount"
                                            value="{{ old('due_amount', 0) }}"
                                            readonly>

                                        <x-admin.error-msg name="due_amount" />
                                    </div>


                                    {{-- Payment Date --}}
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="payment_date">Payment Date</label>

                                        <input type="date"
                                            class="form-control"
                                            id="payment_date"
                                            name="payment_date"
                                            value="{{ old('payment_date', now()->toDateString()) }}">

                                        <x-admin.error-msg name="payment_date" />
                                    </div>

                                </div>


                                {{-- Form Actions --}}
                                <div class="row mt-3">
                                    <div class="col-12">

                                        <button type="submit" class="btn btn-primary me-2">
                                            <i class="mdi mdi-content-save"></i>
                                            Create Payment
                                        </button>

                                        {{-- <a href="{{ route('fee-payments.index') }}" class="btn btn-dark">
                                            <i class="mdi mdi-close"></i>
                                            Cancel
                                        </a> --}}

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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            let studentSelect = $('#student_id');
            let sessionSelect = $('#academic_session_id');
            let semesterSelect = $('#semester_id');

            let feeStructureContainer = $('#fee-structure-container');

            let totalAmountInput = $('#total_amount');
            let previousPaidInput = $('#previous_paid');
            let paymentAmountInput = $('#payment_amount');
            let dueAmountInput = $('#due_amount');


            /*
            |--------------------------------------------------------------------------
            | Student Select2
            |--------------------------------------------------------------------------
            */

            studentSelect.select2({
                placeholder: 'Select Student',
                allowClear: true,
                width: '100%'
            });


            /*
            |--------------------------------------------------------------------------
            | Store All Semester Options
            |--------------------------------------------------------------------------
            */

            let allSemesters = semesterSelect.find('option').clone();


            /*
            |--------------------------------------------------------------------------
            | Calculate Due
            |--------------------------------------------------------------------------
            */

            function calculateDue() {

                let totalAmount =
                    parseFloat(totalAmountInput.val()) || 0;

                let previousPaid =
                    parseFloat(previousPaidInput.val()) || 0;

                let paymentAmount =
                    parseFloat(paymentAmountInput.val()) || 0;

                let due =
                    totalAmount - previousPaid - paymentAmount;

                if (due < 0) {
                    due = 0;
                }

                dueAmountInput.val(
                    due.toFixed(2)
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Filter Semesters
            |--------------------------------------------------------------------------
            */

            function filterSemesters() {

                let sessionId = sessionSelect.val();

                semesterSelect.empty();

                semesterSelect.append(
                    '<option value="">Select Semester</option>'
                );


                if (!sessionId) {
                    return;
                }


                allSemesters.each(function() {

                    let option = $(this);

                    if (option.val() === '') {
                        return;
                    }


                    let optionSessionId =
                        option.data('session');


                    if (optionSessionId == sessionId) {

                        semesterSelect.append(
                            option.clone()
                        );
                    }

                });
            }


            /*
            |--------------------------------------------------------------------------
            | Load Fee Structures
            |--------------------------------------------------------------------------
            */

            function loadFeeStructures() {

                let semesterId = semesterSelect.val();

                feeStructureContainer.html(`
        <div class="alert alert-info">
            Please select a semester to view the fee structure.
        </div>
    `);

                totalAmountInput.val('');
                dueAmountInput.val('0.00');

                if (!semesterId) {
                    return;
                }

                feeStructureContainer.html(`
        <div class="alert alert-info">
            Loading fee structures...
        </div>
    `);

                $.ajax({
                    url: "{{ url('fee-payments/fee-structures') }}/" +
                        semesterId,

                    type: "GET",

                    success: function(feeStructures) {

                        if (feeStructures.length === 0) {

                            feeStructureContainer.html(`
                    <div class="alert alert-warning">
                        No fee structure found for this semester.
                    </div>
                `);

                            totalAmountInput.val('');
                            calculateDue();

                            return;
                        }

                        let html = '';
                        let total = 0;

                        html += `
                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Fee Category</th>
                                <th>Fee Amount</th>
                                <th>Previous Paid</th>
                                <th>Remaining Due</th>
                            </tr>
                        </thead>

                        <tbody>
            `;

                        feeStructures.forEach(function(item) {

                            let amount =
                                parseFloat(item.amount) || 0;

                            total += amount;

                            html += `
                    <tr>

                        <td>
                            ${item.fee_category.name}
                        </td>

                        <td>
                            ৳${amount.toFixed(2)}
                        </td>

                        <td class="previous-paid">
                            ৳0.00
                        </td>

                        

                        <td>
                            <span class="remaining-due">
                                ৳${amount.toFixed(2)}
                            </span>
                        </td>
                        <td>
                            <input
                                type="hidden"
                                step="0.01"
                                min="0"
                                class="form-control payment-detail"
                                name="payment_details[${item.fee_category_id}]"
                                data-category="${item.fee_category_id}"
                                data-amount="${amount}"
                                data-previous-paid="0"
                                value="0"
                            >
                        </td>

                    </tr>
                `;

                        });

                        html += `
                        </tbody>

                        <tfoot>

                            <tr>

                                <th>
                                    Total
                                </th>

                                <th>
                                    ৳${total.toFixed(2)}
                                </th>

                                <th>
                                    ৳0.00
                                </th>

                                

                                <th id="detail-due-total">
                                    ৳${total.toFixed(2)}
                                </th>

                            </tr>

                        </tfoot>

                    </table>

                </div>
            `;

                        feeStructureContainer.html(html);

                        totalAmountInput.val(
                            total.toFixed(2)
                        );

                        calculateDue();
                        loadPreviousPaymentDetails();
                    },

                    error: function() {

                        feeStructureContainer.html(`
                <div class="alert alert-danger">
                    Failed to load fee structures.
                </div>
            `);

                    }
                });
            }
            /*
            |--------------------------------------------------------------------------
            | Load Previous Payment
            |--------------------------------------------------------------------------
            */

            function loadPreviousPayment() {

                let studentId =
                    studentSelect.val();

                let sessionId =
                    sessionSelect.val();

                let semesterId =
                    semesterSelect.val();


                if (!studentId || !sessionId || !semesterId) {

                    previousPaidInput.val('0.00');

                    calculateDue();

                    return;
                }


                $.ajax({

                    url: "{{ url('fee-payments/previous-payment') }}/" +
                        studentId + '/' +
                        sessionId + '/' +
                        semesterId,

                    type: 'GET',

                    success: function(response) {

                        previousPaidInput.val(
                            parseFloat(
                                response.previous_paid
                            ).toFixed(2)
                        );


                        calculateDue();

                    },

                    error: function() {

                        previousPaidInput.val('0.00');

                        calculateDue();

                    }

                });

            }

            function loadPreviousPaymentDetails() {

                let studentId =
                    studentSelect.val();

                let sessionId =
                    sessionSelect.val();

                let semesterId =
                    semesterSelect.val();

                if (!studentId || !sessionId || !semesterId) {
                    return;
                }

                $.ajax({

                    url: "{{ url('fee-payments/previous-payment-details') }}/" +
                        studentId + '/' +
                        sessionId + '/' +
                        semesterId,

                    type: 'GET',

                    success: function(previousPayments) {

                        $('.payment-detail').each(function() {

                            let input = $(this);

                            let categoryId =
                                input.data('category');

                            let feeAmount =
                                parseFloat(
                                    input.data('amount')
                                ) || 0;

                            let previousPaid = 0;

                            previousPayments.forEach(
                                function(item) {

                                    if (
                                        item.fee_category_id ==
                                        categoryId
                                    ) {
                                        previousPaid =
                                            parseFloat(
                                                item.previous_paid
                                            ) || 0;
                                    }

                                }
                            );

                            if (previousPaid > feeAmount) {
                                previousPaid = feeAmount;
                            }

                            let remainingDue =
                                feeAmount - previousPaid;

                            input
                                .closest('tr')
                                .find('.previous-paid')
                                .text(
                                    '৳' +
                                    previousPaid.toFixed(2)
                                );

                            input
                                .closest('tr')
                                .find('.remaining-due')
                                .text(
                                    '৳' +
                                    remainingDue.toFixed(2)
                                );

                            input.data(
                                'previous-paid',
                                previousPaid
                            );

                        });

                        calculatePaymentDetails();
                    },

                    error: function() {

                        console.log(
                            'Failed to load previous payment details.'
                        );

                    }

                });
            }

            /*
            |--------------------------------------------------------------------------
            | Student Change
            |--------------------------------------------------------------------------
            */

            studentSelect.on('change', function() {

                let selectedOption =
                    $(this).find('option:selected');


                let sessionId =
                    selectedOption.data('session');


                if (sessionId) {

                    sessionSelect
                        .val(sessionId)
                        .trigger('change');

                } else {

                    sessionSelect
                        .val('')
                        .trigger('change');

                }

            });


            /*
            |--------------------------------------------------------------------------
            | Academic Session Change
            |--------------------------------------------------------------------------
            */

            sessionSelect.on('change', function() {

                semesterSelect.val('');

                filterSemesters();

                loadFeeStructures();

                previousPaidInput.val('0.00');

                calculateDue();

            });


            /*
            |--------------------------------------------------------------------------
            | Semester Change
            |--------------------------------------------------------------------------
            */

            semesterSelect.on('change', function() {

                loadFeeStructures();

                loadPreviousPayment();


            });


            /*
            |--------------------------------------------------------------------------
            | Payment Amount Change
            |--------------------------------------------------------------------------
            */

            paymentAmountInput.on('input', function() {

                let paymentAmount =
                    parseFloat(
                        $(this).val()
                    ) || 0;

                let remainingPayment =
                    paymentAmount;

                $('.payment-detail').each(function() {

                    let input = $(this);

                    let feeAmount =
                        parseFloat(
                            input.data('amount')
                        ) || 0;

                    let previousPaid =
                        parseFloat(
                            input.data('previous-paid')
                        ) || 0;

                    let currentDue =
                        feeAmount - previousPaid;

                    if (currentDue < 0) {
                        currentDue = 0;
                    }

                    let categoryPayment =
                        Math.min(
                            remainingPayment,
                            currentDue
                        );

                    input.val(
                        categoryPayment.toFixed(2)
                    );

                    remainingPayment -= categoryPayment;

                });

                calculatePaymentDetails();

                calculateDue();

            });

            function calculatePaymentDetails() {

                let totalPayment = 0;
                let totalDue = 0;

                $('.payment-detail').each(function() {

                    let input = $(this);

                    let feeAmount =
                        parseFloat(
                            input.data('amount')
                        ) || 0;

                    let previousPaid =
                        parseFloat(
                            input.data('previous-paid')
                        ) || 0;

                    let currentPayment =
                        parseFloat(
                            input.val()
                        ) || 0;

                    let currentDue =
                        feeAmount - previousPaid;

                    if (currentDue < 0) {
                        currentDue = 0;
                    }

                    if (currentPayment > currentDue) {

                        currentPayment = currentDue;

                        input.val(
                            currentPayment.toFixed(2)
                        );
                    }

                    let remainingDue =
                        currentDue - currentPayment;

                    if (remainingDue < 0) {
                        remainingDue = 0;
                    }

                    totalPayment += currentPayment;
                    totalDue += remainingDue;

                    input
                        .closest('tr')
                        .find('.remaining-due')
                        .text(
                            '৳' +
                            remainingDue.toFixed(2)
                        );

                });

                $('#detail-payment-total').text(
                    '৳' +
                    totalPayment.toFixed(2)
                );

                $('#detail-due-total').text(
                    '৳' +
                    totalDue.toFixed(2)
                );

            }

            $(document).on(
                'input',
                '.payment-detail',
                function() {

                    calculatePaymentDetails();

                }
            );
            /*
            |--------------------------------------------------------------------------
            | Initial Load
            |--------------------------------------------------------------------------
            */

            filterSemesters();

            loadFeeStructures();

            calculateDue();

            loadPreviousPayment();

        });
    </script>
@endsection
