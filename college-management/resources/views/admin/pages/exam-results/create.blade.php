@extends('admin.layouts.master')

@section('title', 'Add Exam Result')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Add Exam Result</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Add Exam Result"
                            subtitle="Enter student examination result from here."
                        >
                            <a
                                href="{{ route('exam-results.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Results
                            </a>
                        </x-admin.phead>


                        <form
                            action="{{ route('exam-results.store') }}"
                            method="POST"
                        >

                            @csrf

                            <div class="row">

                                {{-- Exam --}}
                                <div class="col-md-6 mb-3">

                                    <label for="exam_id">
                                        Exam
                                    </label>

                                    <select
                                        name="exam_id"
                                        id="exam_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Exam
                                        </option>

                                        @foreach ($exams as $exam)

                                            <option
                                                value="{{ $exam->id }}"
                                            >
                                                {{ $exam->name }}
                                                -
                                                {{ $exam->academic_session }}
                                                -
                                                {{ $exam->semester }}
                                                -
                                                {{ $exam->academic_class }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('exam_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                            </div>


                            {{-- Student area --}}
                            <div id="student-container" class="mt-3">

                                <div class="alert alert-info">
                                    Please select an exam first.
                                </div>

                            </div>


                            {{-- Subject area --}}
                            <div id="subject-container" class="mt-4">

                            </div>


                            <div class="mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    disabled
                                    id="save-result"
                                >
                                    <i class="mdi mdi-content-save"></i>
                                    Save Result
                                </button>

                                <a
                                    href="{{ route('exam-results.index') }}"
                                    class="btn btn-dark"
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
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        // ==========================================
        // Exam → Students
        // ==========================================

        $('#exam_id').on('change', function () {

            let examId = $(this).val();

            $('#student-container').html('');
            $('#subject-container').html('');
            $('#save-result').prop('disabled', true);

            if (!examId) {

                $('#student-container').html(`
                    <div class="alert alert-info">
                        Please select an exam first.
                    </div>
                `);

                return;
            }

            $('#student-container').html(`
                <div class="text-center py-3">
                    <i class="mdi mdi-loading mdi-spin"></i>
                    Loading students...
                </div>
            `);

            $.ajax({

                url: `{{ url('exam-results/students') }}/${examId}`,

                type: 'GET',

                success: function (students) {

                    let html = `
                        <div class="form-group">
                            <label for="student_id">
                                Student
                            </label>

                            <select
                                name="student_id"
                                id="student_id"
                                class="form-control"
                            >
                                <option value="">
                                    Select Student
                                </option>
                    `;

                    if (students.length === 0) {

                        html += `
                            <option value="">
                                No students found
                            </option>
                        `;

                    } else {

                        students.forEach(function (student) {

                            html += `
                                <option
                                    value="${student.id}"
                                    data-course="${student.course_id}"
                                >
                                    ${student.student_id} -
                                    ${student.name}
                                </option>
                            `;

                        });

                    }

                    html += `
                            </select>
                        </div>
                    `;

                    $('#student-container').html(html);
                },

                error: function () {

                    $('#student-container').html(`
                        <div class="alert alert-danger">
                            Failed to load students.
                        </div>
                    `);

                }

            });

        });


        // ==========================================
        // Student → Subjects
        // ==========================================

        $(document).on('change', '#student_id', function () {

            let studentId = $(this).val();

            $('#subject-container').html('');
            $('#save-result').prop('disabled', true);

            if (!studentId) {
                return;
            }

            $('#subject-container').html(`
                <div class="text-center py-3">
                    <i class="mdi mdi-loading mdi-spin"></i>
                    Loading subjects...
                </div>
            `);

            $.ajax({

                url: `{{ url('exam-results/subjects') }}/${studentId}`,

                type: 'GET',

                success: function (subjects) {

                    if (subjects.length === 0) {

                        $('#subject-container').html(`
                            <div class="alert alert-warning">
                                No subjects found for this student's course.
                            </div>
                        `);

                        return;
                    }


                    let html = `
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">
                                    Subject Marks
                                </h4>

                                <div class="table-responsive">

                                    <table class="table table-hover">

                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Full Marks</th>
                                                <th>Obtained Marks</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                    `;


                    subjects.forEach(function (subject) {

                        html += `
                            <tr>

                                <td>
                                    ${subject.name}

                                    <input
                                        type="hidden"
                                        name="subjects[]"
                                        value="${subject.id}"
                                    >
                                </td>

                                

                                <td>
                                    <input
                                        type="number"
                                        name="full_marks[${subject.id}]"
                                        class="form-control"
                                        value="100"
                                        min="0"
                                        step="0.01"
                                        required
                                    >
                                </td>

                                <td>
                                    <input
                                        type="number"
                                        name="obtained_marks[${subject.id}]"
                                        class="form-control"
                                        min="0"
                                        step="0.01"
                                        required
                                    >
                                </td>

                            </tr>
                        `;

                    });


                    html += `
                                        </tbody>

                                    </table>

                                </div>

                            </div>
                        </div>
                    `;


                    $('#subject-container').html(html);

                    $('#save-result').prop('disabled', false);

                },

                error: function () {

                    $('#subject-container').html(`
                        <div class="alert alert-danger">
                            Failed to load subjects.
                        </div>
                    `);

                }

            });

        });

    });
</script>

@endsection