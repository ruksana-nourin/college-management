@extends('admin.layouts.master')

@section('title', 'Edit Result')

@section('content')

    <div class="container-fluid">

        <x-admin.phead
            title="Edit Result"
            subtitle="Update student examination result from here."
        >
            <a
                href="{{ route('exam-results.index') }}"
                class="btn btn-secondary"
            >
                <i class="mdi mdi-arrow-left"></i>
                Back
            </a>
        </x-admin.phead>


        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title mb-4">
                            Result Information
                        </h4>


                        {{-- Exam & Student Information --}}

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Exam
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $result->exam }}"
                                    readonly
                                >

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Student
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $result->student_name }}"
                                    readonly
                                >

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Student ID
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $result->student_code }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <hr>


                        {{-- Subjects --}}

                        <h4 class="card-title mb-4">
                            Subject Marks
                        </h4>


                        <form
                            action="{{ route('exam-results.update', $result->id) }}"
                            method="POST"
                        >

                            @csrf

                            @method('PUT')


                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                        <tr>

                                            <th>
                                                #
                                            </th>

                                            <th>
                                                Subject
                                            </th>

                                            <th>
                                                Full Marks
                                            </th>

                                            <th>
                                                Obtained Marks
                                            </th>

                                            <th>
                                                Grade
                                            </th>

                                            <th>
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

                                                    <input
                                                        type="hidden"
                                                        name="subjects[]"
                                                        value="{{ $detail->subject_id }}"
                                                    >

                                                </td>


                                                <td>

                                                    <input
                                                        type="number"
                                                        name="full_marks[{{ $detail->subject_id }}]"
                                                        class="form-control full-marks"
                                                        value="{{ old(
                                                            'full_marks.' . $detail->subject_id,
                                                            $detail->full_marks
                                                        ) }}"
                                                        min="0"
                                                        step="0.01"
                                                        required
                                                    >

                                                </td>


                                                <td>

                                                    <input
                                                        type="number"
                                                        name="obtained_marks[{{ $detail->subject_id }}]"
                                                        class="form-control obtained-marks"
                                                        value="{{ old(
                                                            'obtained_marks.' . $detail->subject_id,
                                                            $detail->obtained_marks
                                                        ) }}"
                                                        min="0"
                                                        max="{{ $detail->full_marks }}"
                                                        step="0.01"
                                                        required
                                                    >

                                                </td>


                                                <td>

                                                    <span class="subject-grade">
                                                        {{ $detail->grade }}
                                                    </span>

                                                </td>


                                                <td>

                                                    <span class="subject-grade-point">
                                                        {{ number_format($detail->grade_point, 2) }}
                                                    </span>

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>


                            @error('subjects')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror


                            <div class="mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    <i class="mdi mdi-content-save"></i>
                                    Update Result
                                </button>


                                <a
                                    href="{{ route('exam-results.index') }}"
                                    class="btn btn-secondary"
                                >
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection