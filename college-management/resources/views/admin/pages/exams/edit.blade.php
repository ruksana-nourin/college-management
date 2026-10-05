@extends('admin.layouts.master')

@section('title', 'Exams - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Exam</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Edit Exam"
                            subtitle="Update examination information from here."
                        >
                            <a
                                href="{{ route('exams.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Exams
                            </a>
                        </x-admin.phead>


                        {{-- Exam Form --}}
                        <form
                            action="{{ route('exams.update', ['exam' => $exam->id]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- Exam Name --}}
                                <div class="col-md-6 mb-3">

                                    <label for="name">Exam Name</label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="{{ old('name', $exam->name) }}"
                                        placeholder="Enter exam name"
                                    >

                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Academic Session --}}
                                <div class="col-md-6 mb-3">

                                    <label for="academic_session_id">
                                        Academic Session
                                    </label>

                                    <select
                                        name="academic_session_id"
                                        id="academic_session_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Academic Session
                                        </option>

                                        @foreach ($academicSessions as $academicSession)

                                            <option
                                                value="{{ $academicSession->id }}"
                                                {{ old('academic_session_id', $exam->academic_session_id) == $academicSession->id ? 'selected' : '' }}
                                            >
                                                {{ $academicSession->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('academic_session_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Semester --}}
                                <div class="col-md-6 mb-3">

                                    <label for="semester_id">
                                        Semester
                                    </label>

                                    <select
                                        name="semester_id"
                                        id="semester_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Semester
                                        </option>

                                        @foreach ($semesters as $semester)

                                            <option
                                                value="{{ $semester->id }}"
                                                data-session="{{ $semester->academic_session_id }}"
                                                {{ old('semester_id', $exam->semester_id) == $semester->id ? 'selected' : '' }}
                                            >
                                                {{ $semester->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('semester_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Course --}}
                                <div class="col-md-6 mb-3">

                                    <label for="course_id">
                                        Course
                                    </label>

                                    <select
                                        name="course_id"
                                        id="course_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Course
                                        </option>

                                        @foreach ($courses as $course)

                                            <option
                                                value="{{ $course->id }}"
                                                {{ old('course_id', $exam->course_id) == $course->id ? 'selected' : '' }}
                                            >
                                                {{ $course->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('course_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Academic Class --}}
                                <div class="col-md-6 mb-3">

                                    <label for="academic_class_id">
                                        Academic Class
                                    </label>

                                    <select
                                        name="academic_class_id"
                                        id="academic_class_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Academic Class
                                        </option>

                                        @foreach ($academicClasses as $academicClass)

                                            <option
                                                value="{{ $academicClass->id }}"
                                                data-course="{{ $academicClass->course_id }}"
                                                {{ old('academic_class_id', $exam->academic_class_id) == $academicClass->id ? 'selected' : '' }}
                                            >
                                                {{ $academicClass->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('academic_class_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Section --}}
                                <div class="col-md-6 mb-3">

                                    <label for="section_id">
                                        Section
                                    </label>

                                    <select
                                        name="section_id"
                                        id="section_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Section
                                        </option>

                                        @foreach ($sections as $section)

                                            <option
                                                value="{{ $section->id }}"
                                                data-class="{{ $section->academic_class_id }}"
                                                {{ old('section_id', $exam->section_id) == $section->id ? 'selected' : '' }}
                                            >
                                                {{ $section->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('section_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Group --}}
                                <div class="col-md-6 mb-3">

                                    <label for="group_id">
                                        Group
                                    </label>

                                    <select
                                        name="group_id"
                                        id="group_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Group
                                        </option>

                                        @foreach ($groups as $group)

                                            <option
                                                value="{{ $group->id }}"
                                                {{ old('group_id', $exam->group_id) == $group->id ? 'selected' : '' }}
                                            >
                                                {{ $group->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('group_id')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- Exam Date --}}
                                <div class="col-md-6 mb-3">

                                    <label for="exam_date">
                                        Exam Date
                                    </label>

                                    <input
                                        type="date"
                                        name="exam_date"
                                        id="exam_date"
                                        class="form-control"
                                        value="{{ old('exam_date', $exam->exam_date) }}"
                                    >

                                    @error('exam_date')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-primary me-2"
                                >
                                    <i class="mdi mdi-content-save"></i>
                                    Update Exam
                                </button>

                                <a
                                    href="{{ route('exams.index') }}"
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

        // ==============================
        // Session → Semester
        // ==============================

        function filterSemesters() {

            let sessionId = $('#academic_session_id').val();

            $('#semester_id option').each(function () {

                if ($(this).val() === '') {
                    return;
                }

                if ($(this).data('session') == sessionId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }

            });
        }


        // ==============================
        // Course → Academic Class
        // ==============================

        function filterAcademicClasses() {

            let courseId = $('#course_id').val();

            $('#academic_class_id option').each(function () {

                if ($(this).val() === '') {
                    return;
                }

                if ($(this).data('course') == courseId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }

            });
        }


        // ==============================
        // Academic Class → Section
        // ==============================

        function filterSections() {

            let classId = $('#academic_class_id').val();

            $('#section_id option').each(function () {

                if ($(this).val() === '') {
                    return;
                }

                if ($(this).data('class') == classId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }

            });
        }


        // ==============================
        // Initial Load
        // ==============================

        filterSemesters();
        filterAcademicClasses();
        filterSections();


        // ==============================
        // Session Change
        // ==============================

        $('#academic_session_id').on('change', function () {

            $('#semester_id').val('');

            filterSemesters();

        });


        // ==============================
        // Course Change
        // ==============================

        $('#course_id').on('change', function () {

            $('#academic_class_id').val('');
            $('#section_id').val('');

            filterAcademicClasses();
            filterSections();

        });


        // ==============================
        // Academic Class Change
        // ==============================

        $('#academic_class_id').on('change', function () {

            $('#section_id').val('');

            filterSections();

        });

    });
</script>

@endsection