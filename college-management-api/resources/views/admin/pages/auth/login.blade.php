@extends('admin.layouts.single-master')

@section('title', 'Sign In | College Management System')

@section('heading', 'Welcome Back')

@section('description')
    Sign in to continue to your college management dashboard
@endsection


@section('content')

<div class="auth-card">

    <div class="auth-card-body">

        <form action="#" method="POST">

            @csrf


            <!-- Email -->
            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <div class="auth-input-group">

                    <i class="mdi mdi-email-outline"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                        required
                    >

                </div>

            </div>


            <!-- Password -->
            <div class="form-group">

                <div class="d-flex justify-content-between">

                    <label for="password">
                        Password
                    </label>

                    <a href="#">
                        Forgot Password?
                    </a>

                </div>


                <div class="auth-input-group">

                    <i class="mdi mdi-lock-outline"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                    >
                        <i class="mdi mdi-eye-off-outline"></i>
                    </button>

                </div>

            </div>


            <!-- Remember -->
            <div class="d-flex align-items-center justify-content-between mb-4">

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="remember"
                        name="remember"
                    >

                    <label
                        class="form-check-label"
                        for="remember"
                    >
                        Remember me
                    </label>

                </div>

            </div>


            <!-- Submit -->
            <div class="d-grid">

                <button
                    type="submit"
                    class="btn btn-primary auth-login-btn"
                >

                    <i class="mdi mdi-login me-2"></i>

                    Sign In

                </button>

            </div>

        </form>


        <!-- Divider -->
        <div class="auth-divider">

            <span>
                OR
            </span>

        </div>


        <!-- Alternative Login -->
        <div class="d-grid">

            <button
                type="button"
                class="btn auth-secondary-btn"
            >

                <i class="mdi mdi-account-outline me-2"></i>

                Continue as Guest

            </button>

        </div>


        <!-- Help -->
        <div class="auth-help text-center">

            <span>
                Need help?
            </span>

            <a href="#">
                Contact Administrator
            </a>

        </div>

    </div>

</div>

@endsection