<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Corona Theme -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/style.css') }}">

    <!-- Authentication Custom CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/auth.css') }}">

    @yield('styles')

    <link rel="shortcut icon"
          href="{{ asset('assets/images/favicon.png') }}">

</head>


<body>

    <main class="auth-page">

        <div class="container">

            <!-- Brand -->
            <div class="row">
                <div class="col-12">

                    <div class="auth-brand text-center">

                        <a href="{{ url('/') }}"
                           class="auth-logo">

                            <div class="auth-logo-icon">
                                <i class="mdi mdi-school"></i>
                            </div>

                            <span>
                                College Management
                            </span>

                        </a>

                    </div>

                </div>
            </div>


            <!-- Heading -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-6 col-md-8 col-12">

                    <div class="text-center auth-heading">

                        <h1>
                            @yield('heading')
                        </h1>

                        <p>
                            @yield('description')
                        </p>

                    </div>

                </div>

            </div>


            <!-- Main Content -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-6 col-md-8 col-12">

                    @yield('content')

                </div>

            </div>


            <!-- Footer -->
            <div class="row">

                <div class="col-12">

                    <div class="auth-footer text-center">

                        <p>
                            © {{ date('Y') }}
                            College Management System.
                            All rights reserved.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    @yield('scripts')

</body>

</html>