@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Create Fee Structure</h3>
            </div>


            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Add Fee Structure" subtitle="Add a new fee structure from here.">
                                <a href="{{ route('fee-structures.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back to Fee Structures
                                </a>
                            </x-admin.phead>

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="{{ route('fee-structures.store') }}" method="POST">
                                            @csrf

                                            {{-- Academic Session --}}
                                            <div class="form-group">

                                                <label>
                                                    Academic Session
                                                </label>

                                                <select class="form-control" name="academic_session_id"
                                                    id="academic_session_id">
                                                    <option value="">
                                                        Select Academic Session
                                                    </option>

                                                    @foreach ($semesters->pluck('academicSession')->unique('id') as $session)
                                                        <option value="{{ $session->id }}"
                                                            {{ old('academic_session_id') == $session->id ? 'selected' : '' }}>
                                                            {{ $session->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                <x-admin.error-msg name="academic_session_id" />

                                            </div>


                                            {{-- Semester --}}
                                            <div class="form-group">

                                                <label>
                                                    Semester
                                                </label>

                                                <select class="form-control" name="semester_id" id="semester_id">
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

                                                <x-admin.error-msg name="semester_id" />

                                            </div>


                                            {{-- Fee Category --}}
                                            <div class="form-group">

                                                <label>
                                                    Fee Category
                                                </label>

                                                <select class="form-control" name="fee_category_id">
                                                    <option value="">
                                                        Select Fee Category
                                                    </option>

                                                    @foreach ($feeCategories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('fee_category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                <x-admin.error-msg name="fee_category_id" />

                                            </div>


                                            {{-- Amount --}}
                                            <div class="form-group">

                                                <label>
                                                    Amount
                                                </label>

                                                <input type="number" step="0.01" min="0" class="form-control"
                                                    name="amount" placeholder="Fee amount" value="{{ old('amount') }}">

                                                <x-admin.error-msg name="amount" />

                                            </div>


                                            <button type="submit" class="btn btn-primary me-2">
                                                Create Fee Structure
                                            </button>

                                            <a href="{{ route('fee-structures.index') }}" class="btn btn-dark">
                                                Cancel
                                            </a>

                                        </form>

                                    </div>
                                </div>
                            </div>

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

            let sessionSelect = $('#academic_session_id');
            let semesterSelect = $('#semester_id');

            function filterSemesters() {

                let sessionId = sessionSelect.val();

                semesterSelect.find('option').each(function() {

                    let option = $(this);

                    if (option.val() === '') {
                        return;
                    }

                    if (option.data('session') == sessionId) {
                        option.show();
                    } else {
                        option.hide();
                    }
                });

                // Reset semester
                if (!sessionId) {
                    semesterSelect.val('');
                    return;
                }

                // Check selected semester belongs to selected session
                let selectedSemester = semesterSelect.find('option:selected');

                if (
                    selectedSemester.val() &&
                    selectedSemester.data('session') != sessionId
                ) {
                    semesterSelect.val('');
                }
            }

            sessionSelect.on('change', function() {

                semesterSelect.val('');

                filterSemesters();

            });

            filterSemesters();

        });
    </script>
@endsection
