@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">

            {{-- Judul Halaman --}}
            <div class="mb-4">
                <h1 class="fw-bold">Daftar Kursus</h1>

                <p class="text-muted">
                    Lengkapi data diri dan pilih program kursus yang ingin kamu ikuti.
                </p>
            </div>

            {{-- Formulir Pendaftaran --}}
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('registration.process') }}" method="POST">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                minlength="3"
                                maxlength="100"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Alamat Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="contoh@email.com"
                                maxlength="255"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Pilih Kursus --}}
                        <div class="mb-4">
                            <label for="course" class="form-label">
                                Pilih Kursus
                            </label>

                            <select
                                name="course"
                                id="course"
                                class="form-select @error('course') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Pilih Kursus --</option>

                                <option
                                    value="web"
                                    {{ old('course', request('course')) === 'web' ? 'selected' : '' }}
                                >
                                    Web Dasar
                                </option>

                                <option
                                    value="php"
                                    {{ old('course', request('course')) === 'php' ? 'selected' : '' }}
                                >
                                    PHP Dasar
                                </option>

                                <option
                                    value="laravel"
                                    {{ old('course', request('course')) === 'laravel' ? 'selected' : '' }}
                                >
                                    Laravel Dasar
                                </option>
                            </select>

                            @error('course')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Informasi Ketersediaan AJAX --}}
                            <div id="courseAvailability" class="mt-3"></div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex flex-wrap justify-content-between gap-2 border-top pt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                &larr; Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Lihat Preview Pendaftaran &rarr;
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const course = document.getElementById('course');

        if (course && course.value) {
            course.dispatchEvent(new Event('change'));
        }
    });
</script>
@endpush