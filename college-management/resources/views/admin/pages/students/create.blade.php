@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add Student</h3>

            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <x-admin.phead icon="person-plus" subtitle="Add a new student from here." title="Add Student">
                                <a href="{{ route('students.index') }}" class="btn btn-warning btn-rounded btn-fw"><i
                                        class="mdi mdi-arrow-left"></i> Back to Students</a>
                            </x-admin.phead>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                {{-- Personal Information --}}
                                <h5 class="mb-4 bg-primary text-white p-2 ">Personal Information</h5>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student ID</label>
                                        <input type="text" name="student_id" class="form-control"
                                            value="{{ old('student_id') }}" placeholder="Enter student ID">
                                        <x-admin.error-msg name="student_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                            placeholder="Enter student name">
                                        <x-admin.error-msg name="name" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                            placeholder="Enter email">
                                        <x-admin.error-msg name="email" />

                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                            placeholder="Enter phone number">
                                        <x-admin.error-msg name="phone" />


                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Gender</label>

                                        <select name="gender" class="form-select col-12 p-2">
                                            <option value="">Select Gender</option>

                                            <option value="Male" @selected(old('gender') == 'Male')>
                                                Male
                                            </option>

                                            <option value="Female" @selected(old('gender') == 'Female')>
                                                Female
                                            </option>

                                            <option value="Other" @selected(old('gender') == 'Other')>
                                                Other
                                            </option>
                                        </select>
                                        <x-admin.error-msg name="gender" />

                                    </div>


                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control col-12"
                                            value="{{ old('date_of_birth') }}">
                                        <x-admin.error-msg name="date_of_birth" />

                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select name="blood_group" class="form-select col-12 p-2">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <x-admin.error-msg name="image" />

                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="3"
                                            placeholder="Enter student address">{{ old('address') }}</textarea>
                                    </div>

                                </div>

                                <hr class="my-4">

                                {{-- Academic Information --}}
                                <h5 class="mb-4 bg-primary text-white p-2">Academic Information</h5>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Department</label>

                                        <select name="department_id" id="department_id" class="form-select col-12">
                                            <option value="">Select Department</option>

                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-admin.error-msg name="department_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Course</label>

                                        <select name="course_id" id="course_id" class="form-select col-12">
                                            <option value="">Select Course</option>
                                        </select>
                                        <x-admin.error-msg name="course_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Academic Class</label>
                                        <select name="academic_class_id" id="academic_class_id" class="form-select col-12">
                                            <option value="">Select Class</option>
                                            {{-- @foreach ($academicClasses as $item )
                                            <option value="{{ $item->id }}" {{ old('academic_class_id')==$item->id ?
                                                'selected' : '' }}>
                                                {{ $item->name }} {{ $item->course->name }}
                                            </option>

                                            @endforeach --}}
                                        </select>
                                        <x-admin.error-msg name="academic_class_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <select name="section_id" id="section_id" class="form-select col-12">
                                            <option value="">Select Section</option>
                                            {{-- @foreach ($sections as $item )
                                            <option value="{{ $item->id }}" {{ old('section_id')==$item->id ? 'selected' :
                                                '' }}>
                                                {{ $item->name }}
                                            </option>

                                            @endforeach --}}
                                        </select>
                                        <x-admin.error-msg name="section_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Group</label>
                                        <select name="group_id" class="form-select col-12">
                                            <option value="">Select Group</option>
                                            @foreach ($groups as $item)
                                                 <option value="{{ $item->id }}" {{ old('group_id') == $item->id ?
                                                'selected' : '' }}>{{ $item->name }}
                                                </option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Academic Session</label>
                                        <select name="academic_session_id" class="form-select col-12">
                                            <option value="">Select Academic Session</option>
                                            @foreach ($academicSessions as $item)
                                                <option value="{{ $item->id }}" {{ old('academic_session_id') == $item->id ?
                                                'selected' : '' }}>{{ $item->name }}</option>

                                            @endforeach
                                        </select>
                                        <x-admin.error-msg name="academic_session_id" />

                                    </div>

                                </div>

                                <hr class="my-4">

                                {{-- Admission Information --}}
                                <h5 class="mb-4 bg-primary text-white p-2">Admission Information</h5>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control"
                                            value="{{ old('admission_date') }}">
                                        <x-admin.error-msg name="admission_date" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Status</label>
                                        <select name="student_status_id" class="form-select col-12 p-2">
                                            <option value="">Select Status</option>
                                            @foreach ($studentStatuses as $item)
                                                <option value="{{ $item->id }}" {{ old('student_status_id') == $item->id ?
                                                'selected' : '' }}>{{ $item->name }}</option>

                                            @endforeach
                                        </select>
                                        <x-admin.error-msg name="student_status_id" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Guardian Name</label>
                                        <input type="text" name="guardian_name" class="form-control"
                                            value="{{ old('guardian_name') }}" placeholder="Enter guardian name">
                                        <x-admin.error-msg name="guardian_name" />

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Guardian Phone</label>
                                        <input type="text" name="guardian_phone" class="form-control"
                                            value="{{ old('guardian_phone') }}" placeholder="Enter guardian phone">
                                        <x-admin.error-msg name="guardian_phone" />

                                    </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="mdi mdi-content-save"></i>
                                        Save Student
                                    </button>

                                    <a href="{{ route('students.index') }}" class="btn btn-light">
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

            // Department -> Course
            $('#department_id').on('change', function () {

                let departmentId = $(this).val();

                $('#course_id').html(
                    '<option value="">Loading...</option>'
                );

                // Reset Academic Class
                $('#academic_class_id').html(
                    '<option value="">Select Class</option>'
                );

                //reset section 
                $('#section_id').html(
                    '<option value="">Select Section</option>'
                );

                if (departmentId) {

                    $.ajax({
                        url: "{{ url('students/courses') }}/" + departmentId,
                        type: "GET",

                        success: function (courses) {

                            $('#course_id').html(
                                '<option value="">Select Course</option>'
                            );

                            $.each(courses, function (key, course) {

                                $('#course_id').append(
                                    '<option value="' + course.id + '">' +
                                    course.name +
                                    '</option>'
                                );

                            });
                        },

                        error: function () {

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
            });


            // Course -> Academic Class
            $('#course_id').on('change', function () {

                let courseId = $(this).val();

                $('#academic_class_id').html(
                    '<option value="">Loading...</option>'
                );

                if (courseId) {

                    $.ajax({
                        url: "{{ url('students/academic-classes') }}/" + courseId,
                        type: "GET",

                        success: function (academicClasses) {

                            $('#academic_class_id').html(
                                '<option value="">Select Class</option>'
                            );
                            $('#section_id').html(
                                '<option value="">Select Section</option>'
                            );

                            $.each(academicClasses, function (key, academicClass) {

                                $('#academic_class_id').append(
                                    '<option value="' +
                                    academicClass.id +
                                    '">' +
                                    academicClass.name +
                                    '</option>'
                                );

                            });

                        },

                        error: function () {

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
            });

            // Academic Class -> Section
            $('#academic_class_id').on('change', function () {

                let academicClassId = $(this).val();

                $('#section_id').html(
                    '<option value="">Loading...</option>'
                );

                if (academicClassId) {

                    $.ajax({
                        url: "{{ url('students/sections') }}/" + academicClassId,
                        type: "GET",

                        success: function (sections) {

                            $('#section_id').html(
                                '<option value="">Select Section</option>'
                            );

                            $.each(sections, function (key, section) {

                                $('#section_id').append(
                                    '<option value="' +
                                    section.id +
                                    '">' +
                                    section.name +
                                    '</option>'
                                );

                            });

                        },

                        error: function () {

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
            });
        });
    </script>




@endsection