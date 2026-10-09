@extends('admin.layouts.master')

@section('title', 'Take Attendance')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Take Attendance</h3>
            </div>

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead title="Take Attendance" subtitle="Create a new attendance session.">

                                <a href="{{ route('attendance-sessions.index') }}"
                                    class="btn btn-warning btn-rounded btn-fw">

                                    <i class="mdi mdi-arrow-left"></i>

                                    Back to Attendance

                                </a>

                            </x-admin.phead>


                            <form action="{{ route('attendance-sessions.store') }}" method="POST">

                                @csrf

                                <div class="row">

                                    {{-- Academic Session --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label>
                                                Academic Session
                                            </label>

                                            <select name="academic_session_id" id="academic_session_id"
                                                class="form-control">

                                                <option value="">
                                                    Select Academic Session
                                                </option>

                                                @foreach ($academicSessions as $academicSession)
                                                    <option value="{{ $academicSession->id }}">

                                                        {{ $academicSession->name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                            <x-admin.error-msg name="academic_session_id" />

                                        </div>

                                    </div>


                                    {{-- Semester --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label for="semester_id">
                                                Semester
                                            </label>

                                            <select name="semester_id" id="semester_id" class="form-control">

                                                <option value="">
                                                    Select Academic Session First
                                                </option>

                                            </select>

                                            <x-admin.error-msg name="semester_id" />

                                        </div>

                                    </div>

                                    {{-- course --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label for="course_id">
                                                Course
                                            </label>

                                            <select name="course_id" id="course_id" class="form-control">

                                                <option value="">
                                                    Select Course
                                                </option>

                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">
                                                        {{ $course->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <x-admin.error-msg name="course_id" />

                                        </div>

                                    </div>

                                    {{-- Class --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label for="class_id">
                                                Class
                                            </label>

                                            <select name="class_id" id="class_id" class="form-control" disabled>

                                                <option value="">
                                                    Select Semester First
                                                </option>

                                            </select>

                                            <x-admin.error-msg name="class_id" />

                                        </div>

                                    </div>


                                    {{-- Section --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label for="section_id">
                                                Section
                                            </label>

                                            <select name="section_id" id="section_id" class="form-control" disabled>

                                                <option value="">
                                                    Select Class First
                                                </option>

                                            </select>

                                            <x-admin.error-msg name="section_id" />

                                        </div>

                                    </div>

                                    {{-- student -- --}}
                                    {{-- <div class="col-12">

                                        <div class="form-group">

                                            <label>
                                                Students
                                            </label>

                                            <div id="student-list-container">

                                                <div class="alert alert-info">
                                                    Select a section to load students.
                                                </div>

                                            </div>

                                        </div>

                                    </div> --}}


                                    {{-- Subject --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label for="subject_id">
                                                Subject
                                            </label>

                                            <select name="subject_id" id="subject_id" class="form-control" disabled>

                                                <option value="">
                                                    Select Course First
                                                </option>

                                            </select>

                                            <x-admin.error-msg name="subject_id" />

                                        </div>

                                    </div>


                                    {{-- Teacher --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label>
                                                Teacher
                                            </label>

                                            <select name="teacher_id" id="teacher_id" class="form-control">

                                                <option value="">
                                                    Select Teacher
                                                </option>

                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">

                                                        {{ $teacher->name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                            <x-admin.error-msg name="teacher_id" />

                                        </div>

                                    </div>


                                    {{-- Attendance Date --}}
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="form-group">

                                            <label>
                                                Attendance Date
                                            </label>

                                            <input type="date" name="attendance_date" class="form-control"
                                                value="{{ old('attendance_date', now()->toDateString()) }}">

                                            <x-admin.error-msg name="attendance_date" />

                                        </div>

                                    </div>

                                </div>


                                <button type="submit" class="btn btn-primary me-2">

                                    Continue

                                </button>

                                <a href="{{ route('attendance-sessions.index') }}" class="btn btn-dark">

                                    Cancel

                                </a>

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
        // Semesters
        $(document).ready(function() {

            $('#academic_session_id').on('change', function() {

                let sessionId = $(this).val();

                let semesterSelect = $('#semester_id');

                semesterSelect.empty();

                semesterSelect.append(
                    '<option value="">Loading semesters...</option>'
                );


                if (!sessionId) {

                    semesterSelect.empty();

                    semesterSelect.append(
                        '<option value="">Select Academic Session First</option>'
                    );

                    return;
                }


                $.ajax({

                    url: "{{ url('attendance-sessions/semesters') }}/" + sessionId,

                    type: "GET",

                    success: function(semesters) {

                        semesterSelect.empty();

                        semesterSelect.append(
                            '<option value="">Select Semester</option>'
                        );


                        if (semesters.length === 0) {

                            semesterSelect.append(
                                '<option value="">No semester found</option>'
                            );

                            return;
                        }


                        semesters.forEach(function(semester) {

                            semesterSelect.append(

                                $('<option>', {

                                    value: semester.id,

                                    text: semester.name

                                })

                            );

                        });

                    },

                    error: function() {

                        semesterSelect.empty();

                        semesterSelect.append(
                            '<option value="">Failed to load semesters</option>'
                        );

                    }

                });

            });

        });

        // class
        $('#course_id').on('change', function() {

            let courseId = $(this).val();

            let classSelect = $('#class_id');

            classSelect.empty();

            if (!courseId) {

                classSelect.append(
                    '<option value="">Select Course First</option>'
                );

                classSelect.prop('disabled', true);

                return;
            }

            classSelect.append(
                '<option value="">Loading classes...</option>'
            );

            classSelect.prop('disabled', true);


            $.ajax({

                url: "{{ url('attendance-sessions/classes') }}/" + courseId,

                type: "GET",

                success: function(classes) {

                    classSelect.empty();

                    classSelect.append(
                        '<option value="">Select Class</option>'
                    );


                    if (classes.length === 0) {

                        classSelect.append(
                            '<option value="">No class found</option>'
                        );

                        return;
                    }


                    classes.forEach(function(item) {

                        classSelect.append(
                            $('<option>', {
                                value: item.id,
                                text: item.name
                            })
                        );

                    });

                    classSelect.prop('disabled', false);

                },

                error: function() {

                    classSelect.empty();

                    classSelect.append(
                        '<option value="">Failed to load classes</option>'
                    );

                }

            });

            let subjectSelect = $('#subject_id');

            subjectSelect.empty();

            subjectSelect.append(
                '<option value="">Loading subjects...</option>'
            );

            subjectSelect.prop('disabled', true);

            $.ajax({

                url: "{{ url('attendance-sessions/subjects') }}/" + courseId,

                type: "GET",

                success: function(subjects) {

                    subjectSelect.empty();

                    subjectSelect.append(
                        '<option value="">Select Subject</option>'
                    );

                    if (subjects.length === 0) {

                        subjectSelect.append(
                            '<option value="">No subject found</option>'
                        );

                        return;
                    }

                    subjects.forEach(function(subject) {

                        subjectSelect.append(
                            $('<option>', {
                                value: subject.id,
                                text: subject.name
                            })
                        );

                    });

                    subjectSelect.prop('disabled', false);

                },

                error: function() {

                    subjectSelect.empty();

                    subjectSelect.append(
                        '<option value="">Failed to load subjects</option>'
                    );

                }

            });
        });

        // section
        $('#class_id').on('change', function() {

            let classId = $(this).val();

            let sectionSelect = $('#section_id');

            sectionSelect.empty();

            if (!classId) {

                sectionSelect.append(
                    '<option value="">Select Class First</option>'
                );

                sectionSelect.prop('disabled', true);

                return;
            }

            sectionSelect.append(
                '<option value="">Loading sections...</option>'
            );

            sectionSelect.prop('disabled', true);


            $.ajax({

                url: "{{ url('attendance-sessions/sections') }}/" + classId,

                type: "GET",

                success: function(sections) {

                    sectionSelect.empty();

                    sectionSelect.append(
                        '<option value="">Select Section</option>'
                    );


                    if (sections.length === 0) {

                        sectionSelect.append(
                            '<option value="">No section found</option>'
                        );

                        return;
                    }


                    sections.forEach(function(section) {

                        sectionSelect.append(
                            $('<option>', {
                                value: section.id,
                                text: section.name
                            })
                        );

                    });

                    sectionSelect.prop('disabled', false);

                },

                error: function() {

                    sectionSelect.empty();

                    sectionSelect.append(
                        '<option value="">Failed to load sections</option>'
                    );

                }

            });

        });
        
        // student
        $('#section_id').on('change', function() {

            let sectionId = $(this).val();

            let studentContainer = $('#student-list-container');

            if (!sectionId) {

                studentContainer.html(`
            <div class="alert alert-info">
                Select a section to load students.
            </div>
        `);

                return;
            }


            studentContainer.html(`
        <div class="alert alert-info">
            Loading students...
        </div>
    `);


            $.ajax({

                url: "{{ url('attendance-sessions/students') }}/" + sectionId,

                type: "GET",

                success: function(students) {

                    if (students.length === 0) {

                        studentContainer.html(`
                    <div class="alert alert-warning">
                        No students found in this section.
                    </div>
                `);

                        return;
                    }


                    let html = `

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th class="text-center">Status</th>
                            </tr>

                        </thead>

                        <tbody>
            `;


                    students.forEach(function(student, index) {

                        html += `

                    <tr>

                        <td>
                            ${index + 1}
                        </td>

                        <td>
                            ${student.student_id}
                        </td>

                        <td>

                            <div class="d-flex align-items-center">

                                ${
                                    student.image
                                    ?
                                    `<img
                                            src="/${student.image}"
                                            width="40"
                                            height="40"
                                            class="rounded-circle me-2"
                                        >`
                                    :
                                    ''
                                }

                                <span>
                                    ${student.name}
                                </span>

                            </div>

                        </td>

                        <td class="text-center">

                            <div class="form-check form-check-inline">

                                <input
                                    type="radio"
                                    class="form-check-input"
                                    name="attendance[${student.id}]"
                                    value="Present"
                                    checked
                                >

                                <label class="form-check-label">
                                    Present
                                </label>

                            </div>


                            <div class="form-check form-check-inline">

                                <input
                                    type="radio"
                                    class="form-check-input"
                                    name="attendance[${student.id}]"
                                    value="Absent"
                                >

                                <label class="form-check-label">
                                    Absent
                                </label>

                            </div>

                        </td>

                    </tr>

                `;

                    });


                    html += `

                        </tbody>

                    </table>

                </div>

            `;


                    studentContainer.html(html);

                },

                error: function() {

                    studentContainer.html(`
                <div class="alert alert-danger">
                    Failed to load students.
                </div>
            `);

                }

            });

        });
    
    </script>

@endsection
