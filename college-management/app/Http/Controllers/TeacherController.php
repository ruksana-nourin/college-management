<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use App\Services\UploadImages;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('department')
            ->latest()
            ->paginate(10);

        return view('admin.pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();

        return view(
            'admin.pages.teachers.create',
            compact('departments')
        );
    }

    public function store(Request $request)
{
    $request->validate([
        'teacher_code' => 'required|string|max:255|unique:teachers,teacher_code',
        'name' => 'required|string|min:3|max:255',

        'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

        'email' => 'required|email|max:255|unique:teachers,email',
        'phone' => 'required|string|max:20',

        'department_id' => 'required|exists:departments,id',
    ]);

    $data = [
        'teacher_code' => $request->teacher_code,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'department_id' => $request->department_id,
    ];

    if ($request->hasFile('img')) {
        $data['img'] = UploadImages::upload(
            $request->img,
            'uploads/teachers'
        );
    }

    Teacher::create($data);

    return redirect()
        ->route('teachers.index')
        ->with('success', 'Teacher created successfully.');
}

    public function show(string $id)
    {
        $teacher = Teacher::join(
            'departments as d',
            'teachers.department_id',
            '=',
            'd.id'
        )
            ->where('teachers.id', $id)
            ->select(
                'teachers.id',
                'teachers.teacher_code',
                'teachers.name',
                'teachers.img',
                'teachers.email',
                'teachers.phone',
                'd.name as department',
                'teachers.created_at',
                'teachers.updated_at'
            )
            ->first();

        return view(
            'admin.pages.teachers.show',
            compact('teacher')
        );
    }

    public function edit(Teacher $teacher)
    {
        $departments = Department::orderBy('name')->get();

        return view(
            'admin.pages.teachers.edit',
            compact('teacher', 'departments')
        );
    }

    public function update(Request $request, string $id)
{
    $teacher = Teacher::findOrFail($id);

    $request->validate([
        'teacher_code' => 'required|string|max:255|unique:teachers,teacher_code,' . $teacher->id,
        'name' => 'required|string|min:3|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'email' => 'required|email|max:255|unique:teachers,email,' . $teacher->id,
        'phone' => 'required|string|max:20',
        'department_id' => 'required|exists:departments,id',
    ]);

    $data = [
        'teacher_code' => $request->teacher_code,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'department_id' => $request->department_id,
    ];

    if ($request->hasFile('img')) {

        $data['img'] = UploadImages::upload(
            $request->file('img'),
            'uploads/teachers'
        );
    }

    $teacher->update($data);

    return redirect()
        ->route('teachers.index')
        ->with('success', 'Teacher updated successfully.');
}

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}
