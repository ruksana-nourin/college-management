@extends('admin.layouts.master')

@section('title', 'Fee Payments')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">

                <h3 class="page-title">
                    Fee Payments
                </h3>


            </div>


            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">


                            {{-- Page Heading --}}
                            <x-admin.phead title="Fee Payments" subtitle="Manage student fee payments from here.">

                                <a href="{{ route('fee-payments.create') }}" class="btn btn-primary">
                                    <i class="mdi mdi-plus"></i>
                                    Add Payment
                                </a>

                            </x-admin.phead>


                            {{-- Session Message --}}
                            @if (session('success'))
                                <div class="alert alert-success">

                                    {{ session('success') }}

                                </div>
                            @endif


                            @if (session('error'))
                                <div class="alert alert-danger">

                                    {{ session('error') }}

                                </div>
                            @endif


                            {{-- Table --}}
                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th>
                                                ID
                                            </th>

                                            <th>
                                                Receipt No
                                            </th>

                                            <th>
                                                Student
                                            </th>

                                            <th>
                                                Session
                                            </th>

                                            <th>
                                                Semester
                                            </th>

                                            <th>
                                                Payment Date
                                            </th>

                                            <th>
                                                Payment
                                            </th>

                                            <th>
                                                Due
                                            </th>

                                            <th>
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($feePayments as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->id }}
                                                </td>


                                                <td>

                                                    <span class="badge badge-info">
                                                        {{ $item->receipt_no }}
                                                    </span>

                                                </td>


                                                <td>

                                                    {{ $item->student->student_id }}
                                                    -
                                                    {{ $item->student->name }}

                                                </td>


                                                <td>
                                                    {{ $item->academicSession->name }}
                                                </td>


                                                <td>
                                                    {{ $item->semester->name }}
                                                </td>


                                                <td>

                                                    {{ \Carbon\Carbon::parse($item->payment_date)->format('d M, Y') }}

                                                </td>


                                                <td>

                                                    ৳{{ number_format($item->payment_amount, 2) }}

                                                </td>


                                                <td>

                                                    @if ($item->due_amount > 0)
                                                        <label class="badge badge-warning btn-rounded">

                                                            ৳{{ number_format($item->due_amount, 2) }}

                                                        </label>
                                                    @else
                                                        <label class="badge badge-success btn-rounded">

                                                            Paid

                                                        </label>
                                                    @endif

                                                </td>


                                                <td>

                                                    <a href="{{ route('fee-payments.show', $item->id) }}"
                                                        class="btn btn-sm btn-info" title="View">

                                                        <i class="mdi mdi-eye"></i>

                                                    </a>

                                                    <a href="{{ route('fee-payments.print', $item->id) }}"
                                                        class="btn btn-sm btn-secondary" title="Print Receipt"
                                                        target="_blank">
                                                        <i class="mdi mdi-printer"></i>
                                                    </a>


                                                    <form
                                                        action="{{ route('fee-payments.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this payment?')">

                                                            <i class="mdi mdi-delete"></i>

                                                        </button>

                                                    </form>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="9" class="text-center">

                                                    No fee payments found.

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

@endsection
