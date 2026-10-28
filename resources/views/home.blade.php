@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')
    {{-- Bagian Sambutan --}}
    <div class="p-5 mb-4 bg-light rounded-3 border">
        <div class="container-fluid py-4">
            <h1 class="display-5 fw-bold">
                Selamat Datang di KursusKu
            </h1>

            <p class="col-md-8 fs-5">
                Tingkatkan kemampuanmu melalui kursus yang sesuai dengan kebutuhan.
                Pelajari materi baru dan kembangkan keterampilanmu bersama KursusKu.
            </p>

            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                Daftar Kursus
            </a>
        </div>
    </div>

    {{-- Bagian Keunggulan KursusKu --}}
    <section class="mt-4">
        <h2 class="mb-3">Mengapa Belajar di KursusKu?</h2>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Materi Terstruktur</h5>

                        <p class="card-text">
                            Pelajari materi secara bertahap agar lebih mudah dipahami.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Belajar Fleksibel</h5>

                        <p class="card-text">
                            Kembangkan kemampuan sesuai kebutuhan dan tujuan belajarmu.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pilihan Kursus</h5>

                        <p class="card-text">
                            Temukan kursus yang sesuai dengan minat dan kemampuanmu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian Daftar Kursus --}}
    <section class="mt-5">
        <h2 class="mb-3">Program Kursus Pilihan</h2>

        <p class="text-muted mb-4">
            Pilih program kursus yang sesuai dengan kebutuhan belajarmu.
        </p>

        <div class="row g-3">
            @forelse ($courses as $course)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                {{ $course['title'] }}
                            </h5>

                            <p class="card-text">
                                {{ $course['description'] }}
                            </p>

                            <p class="fw-bold text-primary fs-5 mt-auto">
                                Rp{{ number_format($course['price'], 0, ',', '.') }}
                            </p>

                            <a
                                href="{{ route('register') }}?course={{ $course['code'] }}"
                                class="btn btn-primary w-100"
                            >
                                Pilih Kursus
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Belum ada program kursus yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection