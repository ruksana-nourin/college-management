<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\FeePayment;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class FeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $feePayments = FeePayment::with([
            'student',
            'academicSession',
            'semester',
        ])
        ->latest()
        ->get();

        return view(
            'admin.pages.fee-payments.index',
            compact('feePayments')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $students = Student::orderBy('name')
            ->get();

        $academicSessions = AcademicSession::orderBy('id')
            ->get();

        $semesters = Semester::with('academicSession')
            ->orderBy('id')
            ->get();

        return view(
            'admin.pages.fee-payments.create',
            compact(
                'students',
                'academicSessions',
                'semesters'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getFeeStructures(Semester $semester)
{
    $feeStructures = $semester->feeStructures()
        ->with('feeCategory')
        ->get();

    return response()->json($feeStructures);
}
}
