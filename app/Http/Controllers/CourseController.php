<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    // Menampilkan daftar kursus
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan form tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru
    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['is_active'] = $request->boolean('is_active');

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan!');
    }

    // Menampilkan detail kursus
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Menampilkan form edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Memperbarui data kursus
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validated = $request->validated();

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['is_active'] = $request->boolean('is_active');

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui!');
    }

    // Menghapus kursus
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus!');
    }
}
