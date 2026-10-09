@extends('admin.layouts.master')

@section('title', 'Students - Edit')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Edit Student</h3>
            </div>

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead title="Edit Student" subtitle="Update student information from here.">
                                <a href="{{ route('students.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back to Students
                                </a>
                            </x-admin.phead>


                            {{-- Validation Errors --}}
                            @if ($errors->any())

                                <div class="alert alert-danger">

                                    <ul class="mb-0">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            <form action="{{ route('students.update', $student->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')


                                {{-- Student Information --}}
                                <h4 class="card-title mb-4 bg-primary text-white p-2">
                                    Student Information
                                </h4>

                                <div class="row">

                                    {{-- Student ID --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Student ID
                                        </label>

                                        <input type="text" name="student_id" class="form-control"
                                            value="{{ old('student_id', $student->student_id) }}">

                                    </div>


                                    {{-- Name --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Student Name
                                        </label>

                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $student->name) }}">

                                    </div>


                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Email
                                        </label>

                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $student->email) }}">

                                    </div>


                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Phone
                                        </label>

                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $student->phone) }}">

                                    </div>


                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Gender
                                        </label>

                                        <select name="gender" class="form-select col-12 p-2">

                                            <option value="">
                                                Select Gender
                                            </option>

                                            <option value="Male"
                                                {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                                                Male
                                            </option>

                                            <option value="Female"
                                                {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                                                Female
                                            </option>

                                            <option value="Other"
                                                {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>

                                        </select>

                                    </div>


                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Date of Birth
                                        </label>

                                        <input type="date" name="date_of_birth" class="form-control"
                                            value="{{ old('date_of_birth', $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : '') }}">

                                    </div>


                                    {{-- Blood Group --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Blood Group
                                        </label>

                                        <input type="text" name="blood_group" class="form-control"
                                            value="{{ old('blood_group', $student->blood_group) }}">

                                    </div>


                                    {{-- Address --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Address
                                        </label>

                                        <textarea name="address" class="form-control" rows="3">{{ old('address', $student->address) }}</textarea>

                                    </div>

                                </div>


                                {{-- Academic Information --}}
                                <h4 class="card-title mb-4 bg-primary text-white p-2">
                                    Academic Information
                                </h4>

                                <div class="row">

                                    {{-- Department --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Department
                                        </label>

                                        <select name="department_id" id="department_id" class="form-select col-12">

                                            <option value="">
                                                Select Department
                                            </option>

                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ old('department_id', $student->department_id) == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>


                                    {{-- Course --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Course
                                        </label>

                                        <select name="course_id" id="course_id" class="form-select col-12">

                                            <option value="">
                                                Select Course
                                            </option>

                                        </select>

                                    </div>


                                    {{-- Academic Class --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Academic Class
                                        </label>

                                        <select name="academic_class_id" id="academic_class_id" class="form-select col-12">

                                            <option value="">
                                                Select Class
                                            </option>

                                        </select>

                                    </div>


                                    {{-- Section --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Section
                                        </label>

                                        <select name="section_id" id="section_id" class="form-select col-12">

                                            <option value="">
                                                Select Section
                                            </option>

                                        </select>

                                    </div>


                                    {{-- Group --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Group
                                        </label>

                                        <select name="group_id" class="form-select col-12">

                                            <option value="">
                                                Select Group
                                            </option>

                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ old('group_id', $student->group_id) == $group->id ? 'selected' : '' }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>


                                    {{-- Academic Session --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Academic Session
                                        </label>

                                        <select name="academic_session_id" class="form-select col-12">

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach ($academicSessions as $academicSession)
                                                <option value="{{ $academicSession->id }}"
                                                    {{ old('academic_session_id', $student->academic_session_id) == $academicSession->id ? 'selected' : '' }}>
                                                    {{ $academicSession->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                {{-- Admission Information --}}
                                <h4 class="card-titlemb-4 bg-primary text-white p-2">
                                    Admission Information
                                </h4>

                                <div class="row">

                                    {{-- Admission Date --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Admission Date
                                        </label>

                                        <input type="date" name="admission_date" class="form-control"
                                            value="{{ old('admission_date', $student->admission_date ? $student->admission_date->format('Y-m-d') : '') }}">

                                    </div>


                                    {{-- Student Status --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Student Status
                                        </label>

                                        <select name="student_status_id" class="form-select">

                                            <option value="">
                                                Select Status
                                            </option>

                                            @foreach ($studentStatuses as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ old('student_status_id', $student->student_status_id) == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                {{-- Guardian Information --}}
                                <h4 class="card-title mb-4 bg-primary text-white p-2">
                                    Guardian Information
                                </h4>

                                <div class="row">

                                    {{-- Guardian Name --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Guardian Name
                                        </label>

                                        <input type="text" name="guardian_name" class="form-control"
                                            value="{{ old('guardian_name', $student->guardian_name) }}">

                                    </div>


                                    {{-- Guardian Phone --}}
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Guardian Phone
                                        </label>

                                        <input type="text" name="guardian_phone" class="form-control"
                                            value="{{ old('guardian_phone', $student->guardian_phone) }}">

                                    </div>

                                </div>


                                {{-- Student Image --}}
                                <h4 class="card-title mb-4 bg-primary text-white p-2">
                                    Student Image
                                </h4>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        @if ($student->image)
                                            <div class="mb-3">

                                                <img src="{{ asset($student->image) }}" alt="{{ $student->name }}"
                                                    width="100" height="100" style="object-fit: cover;"
                                                    class="rounded">

                                            </div>
                                        @endif

                                        <input type="file" name="image" class="form-control" accept="image/*">

                                        <small class="text-muted">
                                            Leave empty if you don't want to change the image.
                                        </small>

                                    </div>

                                </div>


                                {{-- Buttons --}}
                                <div class="mt-4">

                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="mdi mdi-content-save"></i>
                                        Update Student
                                    </button>

                                    <a href="{{ route('students.index') }}" class="btn btn-dark">
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

            // Existing selected values
            let selectedCourse = "{{ old('course_id', $student->course_id) }}";
            let selectedAcademicClass = "{{ old('academic_class_id', $student->academic_class_id) }}";
            let selectedSection = "{{ old('section_id', $student->section_id) }}";


            // =========================
            // Load Courses
            // =========================
            function loadCourses(departmentId, selectedCourseId = null) {

                $('#course_id').html(
                    '<option value="">Loading...</option>'
                );

                $('#academic_class_id').html(
                    '<option value="">Select Class</option>'
                );

                $('#section_id').html(
                    '<option value="">Select Section</option>'
                );

                if (departmentId) {

                    $.ajax({

                        url: "{{ url('students/courses') }}/" + departmentId,
                        type: "GET",

                        success: function(courses) {

                            $('#course_id').html(
                                '<option value="">Select Course</option>'
                            );

                            $.each(courses, function(key, course) {

                                let selected = '';

                                if (selectedCourseId == course.id) {
                                    selected = 'selected';
                                }

                                $('#course_id').append(
                                    '<option value="' +
                                    course.id +
                                    '" ' +
                                    selected +
                                    '>' +
                                    course.name +
                                    '</option>'
                                );

                            });

                            // Load classes after courses
                            if (selectedCourseId) {

                                loadAcademicClasses(
                                    selectedCourseId,
                                    selectedAcademicClass
                                );
                            }

                        },

                        error: function() {

                            $('#course_id').html(
                                '<option value="">Unable to load courses</option>'
                            );

                        }

                    });

                } else {

                    $('#course_id').html(
                        '<option value="">Select Course</option>'
                    );

                }
            }


            // =========================
            // Load Academic Classes
            // =========================
            function loadAcademicClasses(courseId, selectedClassId = null) {

                $('#academic_class_id').html(
                    '<option value="">Loading...</option>'
                );

                $('#section_id').html(
                    '<option value="">Select Section</option>'
                );

                if (courseId) {

                    $.ajax({

                        url: "{{ url('students/academic-classes') }}/" + courseId,
                        type: "GET",

                        success: function(academicClasses) {

                            $('#academic_class_id').html(
                                '<option value="">Select Class</option>'
                            );

                            $.each(
                                academicClasses,
                                function(key, academicClass) {

                                    let selected = '';

                                    if (selectedClassId == academicClass.id) {
                                        selected = 'selected';
                                    }

                                    $('#academic_class_id').append(
                                        '<option value="' +
                                        academicClass.id +
                                        '" ' +
                                        selected +
                                        '>' +
                                        academicClass.name +
                                        '</option>'
                                    );

                                }
                            );

                            // Load sections after classes
                            if (selectedClassId) {

                                loadSections(
                                    selectedClassId,
                                    selectedSection
                                );
                            }

                        },

                        error: function() {

                            $('#academic_class_id').html(
                                '<option value="">Unable to load classes</option>'
                            );

                        }

                    });

                } else {

                    $('#academic_class_id').html(
                        '<option value="">Select Class</option>'
                    );

                }
            }


            // =========================
            // Load Sections
            // =========================
            function loadSections(classId, selectedSectionId = null) {

                $('#section_id').html(
                    '<option value="">Loading...</option>'
                );

                if (classId) {

                    $.ajax({

                        url: "{{ url('students/sections') }}/" + classId,
                        type: "GET",

                        success: function(sections) {

                            $('#section_id').html(
                                '<option value="">Select Section</option>'
                            );

                            $.each(
                                sections,
                                function(key, section) {

                                    let selected = '';

                                    if (selectedSectionId == section.id) {
                                        selected = 'selected';
                                    }

                                    $('#section_id').append(
                                        '<option value="' +
                                        section.id +
                                        '" ' +
                                        selected +
                                        '>' +
                                        section.name +
                                        '</option>'
                                    );

                                }
                            );

                        },

                        error: function() {

                            $('#section_id').html(
                                '<option value="">Unable to load sections</option>'
                            );

                        }

                    });

                } else {

                    $('#section_id').html(
                        '<option value="">Select Section</option>'
                    );

                }
            }


            // =========================
            // Department Change
            // =========================
            $('#department_id').on('change', function() {

                let departmentId = $(this).val();

                // User manually changed department
                selectedCourse = null;
                selectedAcademicClass = null;
                selectedSection = null;

                loadCourses(departmentId);

            });


            // =========================
            // Course Change
            // =========================
            $('#course_id').on('change', function() {

                let courseId = $(this).val();

                // User manually changed course
                selectedAcademicClass = null;
                selectedSection = null;

                loadAcademicClasses(courseId);

            });


            // =========================
            // Academic Class Change
            // =========================
            $('#academic_class_id').on('change', function() {

                let classId = $(this).val();

                // User manually changed class
                selectedSection = null;

                loadSections(classId);

            });


            // =========================
            // Initial Page Load
            // =========================
            let departmentId = $('#department_id').val();

            if (departmentId) {

                loadCourses(
                    departmentId,
                    selectedCourse
                );

            }

        });
    </script>

@endsection
