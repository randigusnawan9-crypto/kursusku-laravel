<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ========================================
// 1. HALAMAN BERANDA - MVC
// ========================================
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// ========================================
// 2. HALAMAN PENDAFTARAN KURSUS
// ========================================
Route::get('/daftar-kursus', function () {
    return view('register');
})->name('register');

// ========================================
// 3. API AJAX KETERSEDIAAN KURSUS
// ========================================
Route::get('/api/course-availability/{course}', function (string $course) {
    $courses = [
        'web' => [
            'name' => 'Web Dasar',
            'quota' => 30,
            'registered' => 18,
        ],
        'php' => [
            'name' => 'PHP Dasar',
            'quota' => 25,
            'registered' => 20,
        ],
        'laravel' => [
            'name' => 'Laravel Dasar',
            'quota' => 20,
            'registered' => 20,
        ],
    ];

    // Periksa apakah kursus tersedia dalam daftar
    if (!isset($courses[$course])) {
        return response()->json([
            'message' => 'Kursus tidak ditemukan.',
        ], 404);
    }

    $selectedCourse = $courses[$course];

    $remaining = $selectedCourse['quota']
        - $selectedCourse['registered'];

    return response()->json([
        'name' => $selectedCourse['name'],
        'quota' => $selectedCourse['quota'],
        'registered' => $selectedCourse['registered'],
        'remaining' => $remaining,
        'available' => $remaining > 0,
        'status' => $remaining > 0 ? 'Tersedia' : 'Penuh',
    ]);
})->name('api.course-availability');

// ========================================
// 4. PROSES FORMULIR PENDAFTARAN
// ========================================
Route::post('/proses-pendaftaran', function (Request $request) {
    // Validasi data formulir
    $validated = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email', 'max:255'],
        'course' => ['required', 'in:web,php,laravel'],
        'participant_type' => ['required', 'in:mahasiswa,umum'],
        'interests' => ['nullable', 'array'],
        'interests.*' => [
            'in:Frontend,Backend,Database,UI/UX',
        ],
        'note' => ['nullable', 'string', 'max:1000'],
    ]);

    // Daftar nama kursus
    $courses = [
        'web' => 'Web Dasar',
        'php' => 'PHP Dasar',
        'laravel' => 'Laravel Dasar',
    ];

    // Menyiapkan data untuk halaman hasil
    $validated['course_name'] = $courses[$validated['course']];
    $validated['interests'] = $validated['interests'] ?? [];

    // Menampilkan ringkasan pendaftaran
    return view('result', [
        'registration' => $validated,
    ]);
})->name('registration.process');