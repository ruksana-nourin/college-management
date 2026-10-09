<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">College M S</a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
            {{-- <img src="{{ asset('assets/images/logo-mini.svg')}}" alt="logo" /> --}}
            College M S
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face23.jpg') }}"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Ruksana Nourin</h5>
                        <span>Admin</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-monitor-dashboard"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- Attendance --}}
        <li class="nav-item menu-items {{ request()->routeIs(['attendance-sessions.*','attendance.report']) ? 'active' : '' }}">

            <a class="nav-link" data-toggle="collapse" href="#attendanceMenus"
                aria-expanded="{{ request()->routeIs(['attendance-sessions.*','attendance.report']) ? 'true' : 'false' }}"
                aria-controls="attendanceMenus">

                <span class="menu-icon">
                    <i class="mdi mdi-account-star"></i>
                </span>

                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs(['attendance-sessions.*','attendance.report']) ? 'show' : '' }}" id="attendanceMenus">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item {{ request()->routeIs('attendance-sessions.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('attendance-sessions.create') }}">
                            Take Attendance
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('attendance-sessions.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('attendance-sessions.index') }}">
                            Attendance List
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('attendance.report') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('attendance.report') }}">
                            Attendance Report
                        </a>
                    </li>

                </ul>
            </div>
        </li>


        {{-- Student --}}
        <li class="nav-item menu-items {{ request()->routeIs('students.*') ? 'active' : '' }}">

            <a class="nav-link" data-toggle="collapse" href="#studentMenu"
                aria-expanded="{{ request()->routeIs('students.*') ? 'true' : 'false' }}" aria-controls="studentMenu">

                <span class="menu-icon">
                    <i class="mdi mdi-account-group"></i>
                </span>

                <span class="menu-title">Student</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs('students.*') ? 'show' : '' }}" id="studentMenu"
                data-parent="#sidebar">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item {{ request()->routeIs('students.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('students.create') }}">
                            Add Student
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('students.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            All Students
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        {{-- Teacher --}}
        <li class="nav-item menu-items {{ request()->routeIs('teachers.*') ? 'active' : '' }}">

            <a class="nav-link" data-toggle="collapse" href="#teacher"
                aria-expanded="{{ request()->routeIs('teachers.*') ? 'true' : 'false' }}" aria-controls="teacher">

                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple"></i>
                </span>

                <span class="menu-title">Teacher</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs('teachers.*') ? 'show' : '' }}" id="teacher"
                data-parent="#sidebar">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teachers.index') }}">
                            All Teachers
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('teachers.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teachers.create') }}">
                            Add Teacher
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        {{-- exam  --}}
        <li class="nav-item menu-items {{ request()->routeIs('exams.*') ? 'active' : '' }}">

            <a class="nav-link" data-toggle="collapse" href="#exam"
                aria-expanded="{{ request()->routeIs('exams.*') ? 'true' : 'false' }}" aria-controls="exam">

                <span class="menu-icon">
                    <i class="mdi mdi-pen-plus"></i>
                </span>

                <span class="menu-title">Exams</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs('exams.*') ? 'show' : '' }}" id="exam"
                data-parent="#sidebar">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item {{ request()->routeIs('exams.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('exams.index') }}">
                            All Exams
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('exams.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('exams.create') }}">
                            Add Exam
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        {{-- result --}}
        <li class="nav-item menu-items {{ request()->routeIs('exam-results.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('exam-results.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-account"></i>
                </span>
                <span class="menu-title">Result</span>
            </a>
        </li>

        {{-- Academic --}}
        <li
            class="nav-item menu-items
                    {{ request()->routeIs('departments.*', 'courses.*', 'academic-classes.*', 'sections.*', 'groups.*', 'academic-sessions.*', 'semesters.*', 'subjects.*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#academic"
                aria-expanded="{{ request()->routeIs('departments.*', 'courses.*', 'academic-classes.*', 'sections.*', 'groups.*', 'academic-sessions.*', 'semesters.*', 'subjects.*') ? 'true' : 'false' }}"
                aria-controls="academic">
                <span class="menu-icon">

                    {{-- <i class="mdi mdi-account-multiple"></i> --}}
                    <i class="mdi mdi-school menu-icon"></i>
                </span>
                <span class="menu-title">Academic</span>
                <i class="menu-arrow"></i>


            </a>

            <div class="collapse {{ request()->routeIs(
                'departments.*',
                'courses.*',
                'academic-classes.*',
                'sections.*',
                'groups.*',
                'academic-sessions.*',
                'semesters.*',
                'subjects.*',
            )
                ? 'show'
                : '' }}"
                id="academic" data-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ request()->routeIs('departments.*') ? 'active' : '' }}"> <a
                            class="nav-link" href="{{ route('departments.index') }}">Department</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}"> <a class="nav-link"
                            href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('academic-classes.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('academic-classes.index') }}">Classes</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('sections.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('sections.index') }}">sections</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('groups.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('groups.index') }}">Groups</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('academic-sessions.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('academic-sessions.index') }}">Academic Sessions</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('semesters.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('semesters.index') }}">Semesters</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('subjects.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- fee Categories --}}
        <li class="nav-item menu-items {{ request()->routeIs('fee-categories.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fee-categories.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-credit-card"></i>
                </span>
                <span class="menu-title">Fee Categories</span>
            </a>
        </li>

        {{-- fee structures --}}
        <li class="nav-item menu-items {{ request()->routeIs('fee-structures.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fee-structures.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-list"></i>
                </span>
                <span class="menu-title">Fee Structure</span>
            </a>
        </li>
        {{-- fee Payments --}}
        <li class="nav-item menu-items {{ request()->routeIs('fee-payments.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fee-payments.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-cash"></i>
                </span>
                <span class="menu-title">Fee Payment</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->
