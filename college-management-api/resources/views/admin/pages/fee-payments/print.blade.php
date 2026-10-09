<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Fee Payment Receipt - {{ $feePayment->receipt_no }}
    </title>

    <style>
        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            background: #f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
            font-size: 13px;
        }


        /* =========================================================
           RECEIPT
        ========================================================= */

        .receipt {
            width: 210mm;
            min-height: 297mm;
            max-width: 100%;
            margin: 20px auto;
            padding: 18mm;
            background: #fff;
            border: 1px solid #ddd;
            position: relative;
        }


        /* =========================================================
           COLLEGE HEADER
        ========================================================= */

        .college-header {
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .college-header h1 {
            margin: 0 0 4px;
            font-size: 24px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .college-header p {
            margin: 2px 0;
            font-size: 11px;
            line-height: 1.3;
        }


        /* =========================================================
           RECEIPT TITLE
        ========================================================= */

        .receipt-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .receipt-title h2 {
            display: inline-block;
            margin: 0;
            padding: 5px 18px;
            border: 1px solid #222;
            font-size: 16px;
            line-height: 1.2;
        }


        /* =========================================================
           STUDENT / RECEIPT INFORMATION
        ========================================================= */

        .receipt-info {
            display: flex;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 15px;
        }

        .receipt-info>div {
            width: 50%;
        }

        .info-row {
            margin-bottom: 5px;
            font-size: 11px;
            line-height: 1.35;
        }

        .info-row strong {
            display: inline-block;
            width: 105px;
        }


        /* =========================================================
           SECTION TITLE
        ========================================================= */

        .section-title {
            margin-top: 8px;
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: bold;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            table-layout: fixed;
        }

        table th,
        table td {
            border: 1px solid #999;
            padding: 5px 6px;
            font-size: 10.5px;
            line-height: 1.25;
            vertical-align: middle;
        }

        table th {
            text-align: left;
            background: #f1f1f1;
            font-weight: bold;
        }

        table tr {
            page-break-inside: avoid;
        }

        .amount {
            text-align: right;
            white-space: nowrap;
        }


        /* =========================================================
           FEE TABLE COLUMN WIDTH
        ========================================================= */

        .fee-table th:nth-child(1),
        .fee-table td:nth-child(1) {
            width: 7%;
            text-align: center;
        }

        .fee-table th:nth-child(2),
        .fee-table td:nth-child(2) {
            width: 43%;
        }

        .fee-table th:nth-child(3),
        .fee-table td:nth-child(3) {
            width: 25%;
            text-align: right;
        }

        .fee-table th:nth-child(4),
        .fee-table td:nth-child(4) {
            width: 25%;
            text-align: right;
        }


        /* =========================================================
           PAYMENT SUMMARY
        ========================================================= */

        .payment-summary {
            width: 48%;
            margin-left: auto;
            margin-top: 10px;
        }

        .payment-summary table {
            margin-top: 0;
        }

        .payment-summary .total {
            font-weight: bold;
            font-size: 12px;
        }


        /* =========================================================
           FOOTER / SIGNATURE
        ========================================================= */

        .footer {
            margin-top: 35px;
            display: flex;
            justify-content: space-between;
            gap: 80px;
        }

        .signature {
            width: 180px;
            text-align: center;
            border-top: 1px solid #222;
            padding-top: 5px;
            font-size: 10px;
        }


        /* =========================================================
           PRINT BUTTON
        ========================================================= */

        .print-button {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .print-button button {
            padding: 7px 14px;
            border: none;
            border-radius: 4px;
            background: #cd0606;
            color: #fff;
            cursor: pointer;
            font-size: 12px;
        }


        /* =========================================================
           PRINT
        ========================================================= */

       /* =========================================================
   A4 PRINT
========================================================= */

@page {
    size: A4 portrait;
    margin: 7mm;
}

@media print {

    html,
    body {
        width: 100%;
        margin: 0;
        padding: 0;
        background: #fff;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        color: #000;
        font-size: 12px;
    }

    .receipt {
        width: 100%;
        max-width: none;
        min-height: auto;

        margin: 0;
        padding: 5mm;

        border: none;
        box-shadow: none;
    }

    /* Hide print button */
    .print-button {
        display: none !important;
    }


    /* =====================================================
       COLLEGE HEADER
    ===================================================== */

    .college-header {
        padding-bottom: 9px;
        margin-bottom: 12px;
        border-bottom: 2px solid #000;
    }

    .college-header h1 {
        font-size: 23px;
        line-height: 1.2;
        margin-bottom: 5px;
    }

    .college-header p {
        font-size: 11px;
        line-height: 1.3;
        margin: 2px 0;
    }


    /* =====================================================
       RECEIPT TITLE
    ===================================================== */

    .receipt-title {
        margin-bottom: 12px;
    }

    .receipt-title h2 {
        font-size: 16px;
        padding: 6px 18px;
        border: 1px solid #000;
    }


    /* =====================================================
       STUDENT INFORMATION
    ===================================================== */

    .receipt-info {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 12px;
    }

    .receipt-info > div {
        width: 50%;
    }

    .info-row {
        font-size: 11px;
        line-height: 1.4;
        margin-bottom: 4px;
    }

    .info-row strong {
        width: 105px;
    }


    /* =====================================================
       SECTION TITLE
    ===================================================== */

    .section-title {
        font-size: 13px;
        font-weight: bold;
        margin-top: 8px;
        margin-bottom: 5px;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    table {
        width: 100%;
        margin-top: 7px;
        border-collapse: collapse;
        table-layout: fixed;
    }

    table th,
    table td {
        padding: 6px 7px;
        font-size: 11px;
        line-height: 1.25;
        border: 1px solid #555;
    }

    table th {
        background: #f1f1f1 !important;
        color: #000 !important;
        font-weight: bold;
    }

    .amount {
        text-align: right;
        white-space: nowrap;
    }


    /* =====================================================
       FEE TABLE
    ===================================================== */

    .fee-table th:nth-child(1),
    .fee-table td:nth-child(1) {
        width: 8%;
        text-align: center;
    }

    .fee-table th:nth-child(2),
    .fee-table td:nth-child(2) {
        width: 42%;
    }

    .fee-table th:nth-child(3),
    .fee-table td:nth-child(3) {
        width: 25%;
        text-align: right;
    }

    .fee-table th:nth-child(4),
    .fee-table td:nth-child(4) {
        width: 25%;
        text-align: right;
    }


    /* =====================================================
       PAYMENT SUMMARY
    ===================================================== */

    .payment-summary {
        width: 55%;
        margin-left: auto;
        margin-top: 12px;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .footer {
        margin-top: 35px;
        display: flex;
        justify-content: space-between;
    }

    .signature {
        width: 180px;
        padding-top: 6px;
        font-size: 10px;
        border-top: 1px solid #000;
    }


    /* =====================================================
       TABLE PAGE BREAK
    ===================================================== */

    .fee-table thead {
        display: table-header-group;
    }

    .fee-table tbody tr {
        page-break-inside: avoid;
    }

    table tr {
        page-break-inside: avoid;
    }
}



        /* =========================================================
           MOBILE SCREEN
        ========================================================= */

        @media screen and (max-width: 768px) {

            body {
                padding: 10px;
            }

            .receipt {
                width: 100%;
                min-height: auto;
                margin: 0;
                padding: 15px;
            }

            .receipt-info {
                flex-direction: column;
                gap: 5px;
            }

            .receipt-info>div {
                width: 100%;
            }

            .info-row strong {
                width: 110px;
            }

            .payment-summary {
                width: 100%;
            }

            .footer {
                margin-top: 30px;
                gap: 20px;
            }

            .signature {
                width: 45%;
            }

            table {
                min-width: 600px;
            }

            .fee-table {
                min-width: 100%;
            }

            .print-button {
                position: static;
                text-align: right;
                margin-bottom: 10px;
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


        {{-- College Header --}}
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


        {{-- Receipt Title --}}
        <div class="receipt-title">

            <h2>
                FEE PAYMENT RECEIPT
            </h2>

        </div>


        {{-- Student Information --}}
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


        {{-- Fee Details --}}
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
                        $detail->feeCategory
                            ->feeStructures()
                            ->where(
                                'semester_id',
                                $feePayment->semester_id
                            )
                            ->value('amount') ?? 0,
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


        {{-- Payment Summary --}}
        <table>

            <thead>

                <tr>
                    <th>
                        Description
                    </th>

                    <th class="amount">
                        Amount
                    </th>
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
                        ৳{{ number_format(
    $feePayment->total_amount -
    $feePayment->payment_amount -
    $feePayment->due_amount,
    2
) }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Current Payment
                    </td>

                    <td class="amount">
                        ৳{{ number_format(
    $feePayment->payment_amount,
    2
) }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Remaining Due
                    </td>

                    <td class="amount">
                        ৳{{ number_format(
    $feePayment->due_amount,
    2
) }}
                    </td>

                </tr>

            </tbody>

        </table>


        {{-- Footer --}}
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