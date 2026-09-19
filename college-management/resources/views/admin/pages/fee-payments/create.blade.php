@extends('admin.layouts.master')

@section('content')
    ```
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

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="{{ route('fee-payments.store') }}" method="POST">
                                            @csrf

                                            {{-- Student --}}
                                            <div class="form-group">
                                                <label>Student</label>

                                                <select name="student_id" id="student_id" class="form-control">
                                                    <option value="">
                                                        Select Student
                                                    </option>

                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}"
                                                            {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                                            {{ $student->student_id }}
                                                            -
                                                            {{ $student->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <x-admin.error-msg name="student_id" />
                                            </div>


                                            {{-- Academic Session --}}
                                            <div class="form-group">
                                                <label>Academic Session</label>

                                                <select name="academic_session_id" id="academic_session_id"
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
                                            <div class="form-group">
                                                <label>Semester</label>

                                                <select name="semester_id" id="semester_id" class="form-control">
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

                                            {{-- fee structure --}}
                                            <div class="form-group">

                                                <label>Fee Structure</label>

                                                <div id="fee-structure-container">

                                                    <div class="alert alert-info">
                                                        Please select a semester to view the fee structure.
                                                    </div>

                                                </div>

                                            </div>

                                            {{-- Total Amount --}}
                                            <div class="form-group">

                                                <label>Total Amount</label>

                                                <input type="number" step="0.01" class="form-control" id="total_amount"
                                                    name="total_amount" value="{{ old('total_amount') }}" readonly>

                                                <x-admin.error-msg name="total_amount" />

                                            </div>
                                            {{-- payment amount --}}
                                            <div class="form-group">

                                                <label>Payment Amount</label>

                                                <input type="number" step="0.01" min="0" class="form-control"
                                                    name="payment_amount" id="payment_amount" placeholder="Payment amount"
                                                    value="{{ old('payment_amount') }}">

                                                <x-admin.error-msg name="payment_amount" />

                                            </div>
                                            {{-- due --}}
                                            <div class="form-group">

                                                <label>Due Amount</label>

                                                <input type="number" step="0.01" class="form-control" name="due_amount"
                                                    id="due_amount" value="{{ old('due_amount', 0) }}" readonly>

                                                <x-admin.error-msg name="due_amount" />

                                            </div>

                                            {{-- Payment Date --}}
                                            <div class="form-group">
                                                <label>Payment Date</label>

                                                <input type="date" class="form-control" name="payment_date"
                                                    value="{{ old('payment_date', now()->toDateString()) }}">

                                                <x-admin.error-msg name="payment_date" />
                                            </div>


                                            {{-- Payment Amount --}}
                                            <div class="form-group">
                                                <label>Payment Amount</label>

                                                <input type="number" step="0.01" min="0" class="form-control"
                                                    name="payment_amount" placeholder="Payment amount"
                                                    value="{{ old('payment_amount') }}">

                                                <x-admin.error-msg name="payment_amount" />
                                            </div>


                                            <button type="submit" class="btn btn-primary me-2">
                                                Create Payment
                                            </button>

                                            <a href="{{ route('fee-payments.index') }}" class="btn btn-dark">
                                                Cancel
                                            </a>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    ```
@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        let sessionSelect = $('#academic_session_id');
        let semesterSelect = $('#semester_id');

        let feeStructureContainer = $('#fee-structure-container');

        let totalAmountInput = $('#total_amount');
        let paymentAmountInput = $('#payment_amount');
        let dueAmountInput = $('#due_amount');


        /*
        |--------------------------------------------------------------------------
        | Store All Semester Options
        |--------------------------------------------------------------------------
        */

        let allSemesters = semesterSelect.find('option').clone();


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

            allSemesters.each(function () {

                let option = $(this);

                if (option.val() === '') {
                    return;
                }

                let optionSessionId = option.data('session');

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
            dueAmountInput.val('0');


            if (!semesterId) {
                return;
            }


            feeStructureContainer.html(`
                <div class="alert alert-info">
                    Loading fee structures...
                </div>
            `);


            $.ajax({

                url: "{{ url('fee-payments/fee-structures') }}/" + semesterId,

                type: "GET",

                success: function (feeStructures) {

                    if (feeStructures.length === 0) {

                        feeStructureContainer.html(`
                            <div class="alert alert-warning">
                                No fee structure found for this semester.
                            </div>
                        `);

                        return;
                    }


                    let html = '';

                    let total = 0;


                    html += `
                        <div class="table-responsive">

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Fee Category</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                    `;


                    feeStructures.forEach(function (item) {

                        let amount = parseFloat(item.amount);

                        total += amount;


                        html += `
                            <tr>

                                <td>
                                    ${item.fee_category.name}
                                </td>

                                <td>
                                    ৳${amount.toFixed(2)}
                                </td>

                            </tr>
                        `;

                    });


                    html += `
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <th>Total Amount</th>

                                        <th>
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

                },

                error: function () {

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
        | Calculate Due
        |--------------------------------------------------------------------------
        */

        function calculateDue() {

            let total =
                parseFloat(totalAmountInput.val()) || 0;

            let payment =
                parseFloat(paymentAmountInput.val()) || 0;


            let due = total - payment;


            if (due < 0) {
                due = 0;
            }


            dueAmountInput.val(
                due.toFixed(2)
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Academic Session Change
        |--------------------------------------------------------------------------
        */

        sessionSelect.on('change', function () {

            semesterSelect.val('');

            filterSemesters();

            loadFeeStructures();

        });


        /*
        |--------------------------------------------------------------------------
        | Semester Change
        |--------------------------------------------------------------------------
        */

        semesterSelect.on('change', function () {

            loadFeeStructures();

        });


        /*
        |--------------------------------------------------------------------------
        | Payment Amount Change
        |--------------------------------------------------------------------------
        */

        paymentAmountInput.on('input', function () {

            calculateDue();

        });


        /*
        |--------------------------------------------------------------------------
        | Initial Load
        |--------------------------------------------------------------------------
        */

        filterSemesters();

        loadFeeStructures();

    });

</script>

@endsection
