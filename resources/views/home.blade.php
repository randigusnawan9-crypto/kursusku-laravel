
@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')

<!-- HERO SECTION -->
<section class="home-hero mb-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <span class="hero-badge">PLATFORM PEMBELAJARAN ONLINE</span>

            <h1 class="hero-title mt-3">
                Kembangkan Potensimu,
                <span>Raih Masa Depanmu.</span>
            </h1>

            <p class="hero-description">
                Temukan berbagai kursus pilihan untuk meningkatkan
                kemampuan, memperluas pengetahuan, dan mempersiapkan
                dirimu menghadapi dunia digital.
            </p>

            <a href="{{ route('courses.index') }}"
               class="btn btn-primary btn-lg">
                Jelajahi Kursus →
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-outline-primary btn-lg ms-2">
                Daftar Sekarang
            </a>
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('images/hero-kursusku.png') }}"
                 alt="Peserta belajar"
                 class="hero-main-image">
        </div>
    </div>
</section>


<!-- KEUNGGULAN KURSUSKU -->
<section class="mb-5">
    <h2 class="section-title text-center mb-4">
        Mengapa Belajar di KursusKu?
    </h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon">📘</div>
                <h4>Materi Terstruktur</h4>
                <p>
                    Materi pembelajaran disusun secara bertahap
                    agar mudah dipahami.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon">⏰</div>
                <h4>Belajar Fleksibel</h4>
                <p>
                    Kembangkan kemampuan sesuai kebutuhan
                    dan tujuan belajarmu.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon">🚀</div>
                <h4>Pilihan Kursus</h4>
                <p>
                    Temukan program kursus sesuai minat
                    dan kemampuanmu.
                </p>
            </div>
        </div>

    </div>
</section>


<!-- KURSUS UNGGULAN -->
<section class="mb-5">

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <span class="section-label">MULAI BELAJAR</span>
            <h2 class="section-title mt-2">Kursus Unggulan</h2>
            <p class="text-muted">
                Pilih kursus yang ingin kamu pelajari.
            </p>
        </div>

        <a href="{{ route('courses.index') }}"
           class="btn btn-outline-primary">
            Lihat Semua Kursus →
        </a>
    </div>

    <div class="row g-4">

        @forelse ($courses as $course)

            <div class="col-md-4">
                <div class="course-card h-100">

                    <div class="course-icon">💻</div>

                    <h4>{{ $course['title'] }}</h4>

                    <p>{{ $course['description'] }}</p>

                    <div class="course-price">
                        Rp {{ number_format($course['price'], 0, ',', '.') }}
                    </div>

                    <a href="{{ route('register') }}"
                       class="btn btn-primary w-100 mt-3">
                        Daftar Kursus
                    </a>

                </div>
            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada kursus tersedia.
                </div>
            </div>

        @endforelse

    </div>
</section>


<!-- LANGKAH BELAJAR -->
<section class="learning-section mb-5">

    <h2 class="section-title text-center mb-4">
        Mulai Belajar dalam 3 Langkah
    </h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="step-card">
                <span>01</span>
                <h4>Pilih Kursus</h4>
                <p>
                    Temukan kursus sesuai minat
                    dan kebutuhanmu.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="step-card">
                <span>02</span>
                <h4>Daftar Kursus</h4>
                <p>
                    Isi formulir pendaftaran
                    untuk mengikuti kursus.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="step-card">
                <span>03</span>
                <h4>Mulai Belajar</h4>
                <p>
                    Kembangkan pengetahuan
                    dan keterampilanmu.
                </p>
            </div>
        </div>

    </div>
</section>


<!-- CALL TO ACTION -->
<section class="cta-section text-center mb-4">

    <h2>Siap Mengembangkan Kemampuanmu?</h2>

    <p>
        Mulai perjalanan belajar bersama KursusKu sekarang.
    </p>

    <a href="{{ route('register') }}"
       class="btn btn-light btn-lg">
        Daftar Sekarang →
    </a>

</section>

@endsection
