<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Fee Payment Receipt - {{ $feePayment->receipt_no }}
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .receipt {
            width: 800px;
            max-width: 100%;
            margin: 0 auto;
            padding: 35px;
            background: #fff;
            border: 1px solid #ddd;
            position: relative;
        }

        .college-header {
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .college-header h1 {
            margin: 0 0 8px;
            font-size: 28px;
            text-transform: uppercase;
        }

        .college-header p {
            margin: 4px 0;
            font-size: 14px;
        }

        .receipt-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .receipt-title h2 {
            display: inline-block;
            margin: 0;
            padding: 8px 25px;
            border: 1px solid #222;
            font-size: 20px;
        }

        .receipt-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .receipt-info div {
            width: 48%;
        }

        .info-row {
            margin-bottom: 8px;
        }

        .info-row strong {
            display: inline-block;
            width: 130px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #999;
            padding: 10px;
        }

        table th {
            text-align: left;
            background: #f2f2f2;
        }

        .amount {
            text-align: right;
        }

        .payment-summary {
            width: 50%;
            margin-left: auto;
            margin-top: 20px;
        }

        .payment-summary table {
            margin-top: 0;
        }

        .payment-summary .total {
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            width: 180px;
            text-align: center;
            border-top: 1px solid #222;
            padding-top: 8px;
        }

        .print-button {
            /* text-align: center; */
            /* margin-bottom: 20px; */
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .print-button button {
            padding: 10px 20px;
            border: none;
            background: #cd0606;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            align-content: end;
        }

        @media print {

            body {
                padding: 0;
                background: #fff;
            }

            .receipt {
                width: 100%;
                border: none;
            }

            .print-button {
                display: none;
            }

        }
    </style>

</head>

<body>


    <div class="receipt">
        <div class="print-button">
            <button onclick="window.print()">
                Print Receipt
            </button>
        </div>

        <div class="college-header">

            <h1>
                Creative College
            </h1>

            <p>
                Address: 123 Main Street, Mirpur, Dhaka
            </p>

            <p>
                Phone: +88 123 456 789
            </p>

        </div>

        <div class="receipt-title">

            <h2>
                FEE PAYMENT RECEIPT
            </h2>

        </div>

        <div class="receipt-info">

            <div>

                <div class="info-row">
                    <strong>Receipt No:</strong>
                    {{ $feePayment->receipt_no }}
                </div>

                <div class="info-row">
                    <strong>Student ID:</strong>
                    {{ $feePayment->student->student_id }}
                </div>

                <div class="info-row">
                    <strong>Student Name:</strong>
                    {{ $feePayment->student->name }}
                </div>

                <div class="info-row">
                    <strong>Session:</strong>
                    {{ $feePayment->academicSession->name }}
                </div>

            </div>

            <div>

                <div class="info-row">
                    <strong>Payment Date:</strong>
                    {{ \Carbon\Carbon::parse($feePayment->payment_date)->format('d M, Y') }}
                </div>

                <div class="info-row">
                    <strong>Semester:</strong>
                    {{ $feePayment->semester->name }}
                </div>

                <div class="info-row">
                    <strong>Department:</strong>
                    {{ $feePayment->student->department->name ?? 'N/A' }}
                </div>

                <div class="info-row">
                    <strong>Course:</strong>
                    {{ $feePayment->student->course->name ?? 'N/A' }}
                </div>

            </div>

        </div>
        <div class="section-title">
            Fee Payment Details
        </div>

        <table class="fee-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fee Category</th>
                    <th>Fee Amount</th>
                    <th>Paid Amount</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($feePayment->details as $detail)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $detail->feeCategory->name }}
                        </td>

                        <td>
                            ৳{{ number_format(
                                $detail->feeCategory->feeStructures()->where('semester_id', $feePayment->semester_id)->value('amount') ?? 0,
                                2,
                            ) }}
                        </td>

                        <td>
                            ৳{{ number_format($detail->amount, 2) }}
                        </td>
                    </tr>
                @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3" style="text-align: right;">
                        Total Paid
                    </th>

                    <th>
                        ৳{{ number_format($feePayment->payment_amount, 2) }}
                    </th>
                </tr>
            </tfoot>
        </table>

        <table>

            <thead>

                <tr>
                    <th>Description</th>
                    <th class="amount">Amount</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>
                        Total Semester Fee
                    </td>

                    <td class="amount">
                        ৳{{ number_format($feePayment->total_amount, 2) }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Previous Paid
                    </td>

                    <td class="amount">
                        ৳{{ number_format($feePayment->total_amount - $feePayment->payment_amount - $feePayment->due_amount, 2) }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Current Payment
                    </td>

                    <td class="amount">
                        ৳{{ number_format($feePayment->payment_amount, 2) }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Remaining Due
                    </td>

                    <td class="amount">
                        ৳{{ number_format($feePayment->due_amount, 2) }}
                    </td>
                </tr>

            </tbody>

        </table>

        <div class="footer">

            <div class="signature">
                Student / Guardian
            </div>

            <div class="signature">
                Authorized Signature
            </div>

        </div>

    </div>

</body>

</html>
