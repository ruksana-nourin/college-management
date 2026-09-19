<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = Semester::with('academicSession')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'admin.pages.semesters.index',
            compact('semesters')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicSessions = AcademicSession::orderBy('start_date', 'desc')
            ->get();

        return view(
            'admin.pages.semesters.create',
            compact('academicSessions')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'academic_session_id' => 'required|exists:academic_sessions,id',

            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique('semesters', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'academic_session_id',
                            $request->academic_session_id
                        );
                    }),
            ],

            'start_date' => 'required|date',

            'end_date' => 'required|date|after:start_date',

            'description' => 'nullable|string',
        ]);

        Semester::create([
            'academic_session_id' => $request->academic_session_id,
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        $semester->load('academicSession');

        return view(
            'admin.pages.semesters.show',
            compact('semester')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        $academicSessions = AcademicSession::orderBy('start_date', 'desc')
            ->get();

        return view(
            'admin.pages.semesters.edit',
            compact('semester', 'academicSessions')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'academic_session_id' => 'required|exists:academic_sessions,id',

            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique('semesters', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'academic_session_id',
                            $request->academic_session_id
                        );
                    })
                    ->ignore($semester->id),
            ],

            'start_date' => 'required|date',

            'end_date' => 'required|date|after:start_date',

            'description' => 'nullable|string',
        ]);

        $semester->update([
            'academic_session_id' => $request->academic_session_id,
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {

        if ($semester->feeStructures()->exists()) {

            return redirect()
                ->route('semesters.index')
                ->with(
                    'error',
                    'This semester cannot be deleted because fee structures exist for it.'
                );
        }


        $semester->delete();

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
