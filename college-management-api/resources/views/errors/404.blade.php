@extends('admin.layouts.single-master')

@section('title', '404 | Page Not Found')

@section('heading', 'Page Not Found')

@section('description')
    The page you are looking for doesn't exist or may have been moved.
@endsection


@section('content')

<div class="auth-card error-card">

    <div class="auth-card-body text-center">


        <!-- Error Icon -->
        <div class="error-icon">

            <i class="mdi mdi-map-marker-question-outline"></i>

        </div>


        <!-- Error Number -->
        <div class="error-code">
            404
        </div>


        <h3>
            Oops! Page Not Found
        </h3>


        <p class="error-description">

            We couldn't find the page you were
            looking for. It may have been removed,
            renamed, or doesn't exist.

        </p>


        <!-- Actions -->
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">

            <a
                href="{{ url('/dashboard') }}"
                class="btn btn-primary"
            >

                <i class="mdi mdi-view-dashboard-outline me-2"></i>

                Back to Dashboard

            </a>


            <button
                type="button"
                onclick="history.back()"
                class="btn auth-secondary-btn"
            >

                <i class="mdi mdi-arrow-left me-2"></i>

                Go Back

            </button>

        </div>


        <!-- Help -->
        <div class="auth-help">

            <span>
                Still having trouble?
            </span>

            <a href="#">
                Contact Administrator
            </a>

        </div>

    </div>

</div>

@endsection