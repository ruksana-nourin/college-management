<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('academicClass')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.pages.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicClasses = AcademicClass::orderBy('name')->get();

        return view(
            'admin.pages.sections.create',
            compact('academicClasses')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'academic_class_id' => 'required|exists:academic_classes,id',

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sections', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'academic_class_id',
                            $request->academic_class_id
                        );
                    }),
            ],

            'code' => 'required|string|max:50|unique:sections,code',

            'description' => 'nullable|string',
        ]);

        Section::create([
            'academic_class_id' => $request->academic_class_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        $section->load('academicClass.course');

        return view('admin.pages.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $academicClasses = AcademicClass::with('course')
            ->orderBy('name')
            ->get();

        return view(
            'admin.pages.sections.edit',
            compact('section', 'academicClasses')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'academic_class_id' => 'required|exists:academic_classes,id',

            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique('sections', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'academic_class_id',
                            $request->academic_class_id
                        );
                    })
                    ->ignore($section->id),
            ],

            'code' => [
                'required',
                'string',
                'max:50',

                Rule::unique('sections', 'code')
                    ->ignore($section->id),
            ],

            'description' => 'nullable|string',
        ]);

        $section->update([
            'academic_class_id' => $request->academic_class_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section deleted successfully.');
    }
}
