<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AcademicSessionController extends Controller
{
    public function index()
    {
        $academicSessions = AcademicSession::orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'admin.pages.academic-sessions.index',
            compact('academicSessions')
        );
    }

    public function create()
    {
        return view('admin.pages.academic-sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:academic_sessions,name',
            'code' => 'required|string|max:50|unique:academic_sessions,code',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        AcademicSession::create([
            'name' => $request->name,
            'code' => $request->code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('academic-sessions.index')
            ->with('success', 'Academic session created successfully.');
    }

    public function show(AcademicSession $academicSession)
    {
        return view(
            'admin.pages.academic-sessions.show',
            compact('academicSession')
        );
    }

    public function edit(AcademicSession $academicSession)
    {
        return view(
            'admin.pages.academic-sessions.edit',
            compact('academicSession')
        );
    }

    public function update(
        Request $request,
        AcademicSession $academicSession
    ) {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('academic_sessions', 'name')
                    ->ignore($academicSession->id),
            ],

            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('academic_sessions', 'code')
                    ->ignore($academicSession->id),
            ],

            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        $academicSession->update([
            'name' => $request->name,
            'code' => $request->code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('academic-sessions.index')
            ->with('success', 'Academic session updated successfully.');
    }

    public function destroy(AcademicSession $academicSession)
    {
        $academicSession->delete();

        return redirect()
            ->route('academic-sessions.index')
            ->with('success', 'Academic session deleted successfully.');
    }
}