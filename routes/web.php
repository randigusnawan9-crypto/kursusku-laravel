
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

// ==========================================
// HALAMAN BERANDA
// ==========================================
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// ==========================================
// HALAMAN PENDAFTARAN KURSUS
// ==========================================
Route::get('/daftar-kursus', function () {
    return view('enrollments.create');
})->name('register');

// ==========================================
// API KETERSEDIAAN KURSUS (AJAX)
// ==========================================
Route::get('/api/course-availability/{course}', function ($course) {

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

    if (!isset($courses[$course])) {
        return response()->json([
            'message' => 'Kursus tidak ditemukan.',
        ], 404);
    }

    $data = $courses[$course];

    $remaining = $data['quota'] - $data['registered'];

    return response()->json([
        'name' => $data['name'],
        'quota' => $data['quota'],
        'registered' => $data['registered'],
        'remaining' => $remaining,
        'available' => $remaining > 0,
        'status' => $remaining > 0 ? 'Tersedia' : 'Penuh',
    ]);

})->name('course.availability');

// ==========================================
// PROSES PENDAFTARAN (POST)
// ==========================================
Route::post('/proses-pendaftaran', function (Request $request) {

    $validated = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email', 'max:255'],
        'course' => ['required', 'in:web,php,laravel'],
    ]);

    $courses = [
        'web' => 'Web Dasar',
        'php' => 'PHP Dasar',
        'laravel' => 'Laravel Dasar',
    ];

    $validated['course_name'] = $courses[$validated['course']];

    return view('result', [
        'registration' => $validated,
    ]);

})->name('registration.process');
// ROUTE COURSE - PERTEMUAN 10
Route::resource('courses', CourseController::class)
    ->only(['index', 'create', 'store']);