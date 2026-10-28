<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $courses = [
            [
                'code' => 'web',
                'title' => 'Web Dasar',
                'description' => 'Pelajari dasar-dasar pengembangan web.',
                'price' => 300000,
            ],
            [
                'code' => 'php',
                'title' => 'PHP Dasar',
                'description' => 'Pelajari pemrograman PHP untuk membangun website.',
                'price' => 400000,
            ],
            [
                'code' => 'laravel',
                'title' => 'Laravel Dasar',
                'description' => 'Pelajari framework Laravel untuk membangun aplikasi web.',
                'price' => 500000,
            ],
        ];

        return view('home', compact('courses'));
    }
}