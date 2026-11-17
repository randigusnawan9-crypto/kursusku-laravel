<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Participant;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    // Menampilkan form pendaftaran
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        $courses = Course::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view('enrollments.create', compact('participants', 'courses'));
    }

    // Menyimpan data pendaftaran
    public function store(Request $request)
    {
        $data = $request->validate([
            'participant_id' => [
                'required',
                'exists:participants,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments')->where(
                    fn ($query) => $query->where(
                        'participant_id',
                        $request->participant_id
                    )
                ),
            ],
        ], [
            'participant_id.required' => 'Peserta wajib dipilih.',
            'course_id.required' => 'Kursus wajib dipilih.',
            'course_id.unique' => 'Participant ini sudah terdaftar pada course tersebut.',
        ]);

        $data['status'] = 'registered';

        Enrollment::create($data);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Pendaftaran peserta berhasil disimpan!');
    }

    // Menampilkan laporan pendaftaran
    public function index()
    {
        $enrollments = Enrollment::with(['participant', 'course'])
            ->latest()
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
}
