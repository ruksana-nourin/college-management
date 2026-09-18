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
                        <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face15.jpg') }}"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                        <span>Gold Member</span>
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
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    {{-- <i class="mdi mdi-people-fill"></i> --}}
                    <i class="mdi mdi-account-group"></i>
                </span>
                <span class="menu-title">Student</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="student">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">All Students</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Add Student</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Student
                            Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#teacher" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    {{-- <i class="mdi mdi-people-fill"></i> --}}
                    <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">Teacher</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="teacher">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">All Teachers</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Add Teacher</a>
                    </li>
                </ul>
            </div>
        </li>
        <li
            class="nav-item 
                    {{ request()->routeIs('departments.*', 'courses.*', 'academic-classes.*','sections.*', 'groups.*','academic-sessions.*','semesters.*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#academic"
                aria-expanded="{{ request()->routeIs('departments.*', 'courses.*', 'academic-classes.*','sections.*', 'groups.*','academic-sessions.*','semesters.*') ? 'true' : 'false' }}"
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
                                            'semesters.*') ? 'show' : '' }}" id="academic">
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
                </ul>
            </div>
        </li>


        <li class="nav-item menu-items {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Form Elements</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link"
                href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
