@extends('admin.layouts.master')

@section('title', 'Create Exam')

@section('content')

@section('styles')
@endsection

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Create Exam</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Create Exam"
                            subtitle="Add a new examination from here."
                        >
                            <a href="{{ route('exams.index') }}"
                                class="btn btn-secondary btn-rounded btn-fw">
                                <i class="mdi mdi-arrow-left"></i>
                                Back
                            </a>
                        </x-admin.phead>

                        <form action="{{ route('exams.store') }}" method="POST">

                            @csrf

                            {{-- Exam Name --}}
                            <div class="form-group">
                                <label for="name">Exam Name</label>

                                <input type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter exam name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="row">

                                {{-- Academic Session --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="academic_session_id">
                                            Academic Session
                                        </label>

                                        <select name="academic_session_id"
                                            id="academic_session_id"
                                            class="form-control @error('academic_session_id') is-invalid @enderror">

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach ($academicSessions as $session)
                                                <option value="{{ $session->id }}"
                                                    {{ old('academic_session_id') == $session->id ? 'selected' : '' }}>
                                                    {{ $session->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('academic_session_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Semester --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="semester_id">
                                            Semester
                                        </label>

                                        <select name="semester_id"
                                            id="semester_id"
                                            class="form-control @error('semester_id') is-invalid @enderror">

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

                                        @error('semester_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                {{-- Course --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="course_id">
                                            Course
                                        </label>

                                        <select name="course_id"
                                            id="course_id"
                                            class="form-control @error('course_id') is-invalid @enderror">

                                            <option value="">
                                                Select Course
                                            </option>

                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('course_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Academic Class --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="academic_class_id">
                                            Academic Class
                                        </label>

                                        <select name="academic_class_id"
                                            id="academic_class_id"
                                            class="form-control @error('academic_class_id') is-invalid @enderror">

                                            <option value="">
                                                Select Academic Class
                                            </option>

                                            @foreach ($academicClasses as $academicClass)
                                                <option value="{{ $academicClass->id }}"
                                                    data-course="{{ $academicClass->course_id }}"
                                                    {{ old('academic_class_id') == $academicClass->id ? 'selected' : '' }}>
                                                    {{ $academicClass->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('academic_class_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                {{-- Section --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="section_id">
                                            Section
                                        </label>

                                        <select name="section_id"
                                            id="section_id"
                                            class="form-control @error('section_id') is-invalid @enderror">

                                            <option value="">
                                                Select Section
                                            </option>

                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"
                                                    data-class="{{ $section->academic_class_id }}"
                                                    {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('section_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Group --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="group_id">
                                            Group
                                        </label>

                                        <select name="group_id"
                                            id="group_id"
                                            class="form-control @error('group_id') is-invalid @enderror">

                                            <option value="">
                                                Select Group
                                            </option>

                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('group_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                            </div>


                            {{-- Exam Date --}}
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exam_date">
                                            Exam Date
                                        </label>

                                        <input type="date"
                                            name="exam_date"
                                            id="exam_date"
                                            class="form-control @error('exam_date') is-invalid @enderror"
                                            value="{{ old('exam_date') }}">

                                        @error('exam_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="mt-4">

                                <button type="submit"
                                    class="btn btn-success btn-rounded btn-fw">
                                    <i class="mdi mdi-content-save"></i>
                                    Save Exam
                                </button>

                                <a href="{{ route('exams.index') }}"
                                    class="btn btn-light btn-rounded btn-fw">
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
    $(document).ready(function() {

        // ==========================================
        // Academic Session → Semester
        // ==========================================

        function filterSemesters() {

            let sessionId = $('#academic_session_id').val();

            $('#semester_id option').each(function() {

                let option = $(this);

                if (option.val() === '') {
                    option.show();
                    return;
                }

                if (option.data('session') == sessionId) {
                    option.show();
                } else {
                    option.hide();
                }

            });

            let selectedSemester = $('#semester_id option:selected');

            if (
                selectedSemester.val() !== '' &&
                selectedSemester.data('session') != sessionId
            ) {
                $('#semester_id').val('');
            }
        }


        // ==========================================
        // Course → Academic Class
        // ==========================================

        function filterAcademicClasses() {

            let courseId = $('#course_id').val();

            $('#academic_class_id option').each(function() {

                let option = $(this);

                if (option.val() === '') {
                    option.show();
                    return;
                }

                if (option.data('course') == courseId) {
                    option.show();
                } else {
                    option.hide();
                }

            });

            let selectedClass = $('#academic_class_id option:selected');

            if (
                selectedClass.val() !== '' &&
                selectedClass.data('course') != courseId
            ) {
                $('#academic_class_id').val('');
            }

            // Class changed → Section must be reset
            filterSections();
        }


        // ==========================================
        // Academic Class → Section
        // ==========================================

        function filterSections() {

            let classId = $('#academic_class_id').val();

            $('#section_id option').each(function() {

                let option = $(this);

                if (option.val() === '') {
                    option.show();
                    return;
                }

                if (option.data('class') == classId) {
                    option.show();
                } else {
                    option.hide();
                }

            });

            let selectedSection = $('#section_id option:selected');

            if (
                selectedSection.val() !== '' &&
                selectedSection.data('class') != classId
            ) {
                $('#section_id').val('');
            }
        }


        // ==========================================
        // Change Events
        // ==========================================

        $('#academic_session_id').on('change', function() {
            filterSemesters();
        });

        $('#course_id').on('change', function() {
            filterAcademicClasses();
        });

        $('#academic_class_id').on('change', function() {
            filterSections();
        });


        // ==========================================
        // Initial Load
        // ==========================================

        filterSemesters();
        filterAcademicClasses();
        filterSections();

    });
</script>

@endsection
