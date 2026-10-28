@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">

            {{-- Judul Halaman --}}
            <div class="mb-4">
                <h1 class="fw-bold">Daftar Kursus</h1>
                <p class="text-muted">
                    Isi formulir berikut untuk mendaftar program kursus pilihanmu.
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

                        {{-- Email --}}
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
                                placeholder="nama@email.com"
                                maxlength="255"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Pilihan Kursus --}}
                        <div class="mb-3">
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

                        {{-- Jenis Peserta --}}
                        <fieldset class="mb-3">
                            <legend class="form-label fs-6">
                                Jenis Peserta
                            </legend>

                            <div class="form-check">
                                <input
                                    type="radio"
                                    name="participant_type"
                                    id="mahasiswa"
                                    value="mahasiswa"
                                    class="form-check-input"
                                    {{ old('participant_type', 'mahasiswa') === 'mahasiswa' ? 'checked' : '' }}
                                    required
                                >

                                <label for="mahasiswa" class="form-check-label">
                                    Mahasiswa
                                </label>
                            </div>

                            <div class="form-check">
                                <input
                                    type="radio"
                                    name="participant_type"
                                    id="umum"
                                    value="umum"
                                    class="form-check-input"
                                    {{ old('participant_type') === 'umum' ? 'checked' : '' }}
                                >

                                <label for="umum" class="form-check-label">
                                    Umum
                                </label>
                            </div>

                            @error('participant_type')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Minat Belajar --}}
                        <fieldset class="mb-3">
                            <legend class="form-label fs-6">
                                Minat Belajar
                            </legend>

                            @php
                                $interestOptions = [
                                    'Frontend' => 'Frontend',
                                    'Backend' => 'Backend',
                                    'Database' => 'Database',
                                    'UI/UX' => 'UI/UX',
                                ];

                                $selectedInterests = old('interests', []);
                            @endphp

                            @foreach ($interestOptions as $value => $label)
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        name="interests[]"
                                        id="interest_{{ $loop->index }}"
                                        value="{{ $value }}"
                                        class="form-check-input"
                                        {{ in_array($value, $selectedInterests) ? 'checked' : '' }}
                                    >

                                    <label
                                        for="interest_{{ $loop->index }}"
                                        class="form-check-label"
                                    >
                                        {{ $label }}
                                    </label>
                                </div>
                            @endforeach

                            @error('interests')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Catatan --}}
                        <div class="mb-4">
                            <label for="note" class="form-label">
                                Catatan (Opsional)
                            </label>

                            <textarea
                                name="note"
                                id="note"
                                rows="4"
                                maxlength="1000"
                                class="form-control @error('note') is-invalid @enderror"
                                placeholder="Tuliskan catatan jika ada"
                            >{{ old('note') }}</textarea>

                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary">
                                Kirim Pendaftaran
                            </button>

                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                Kembali ke Beranda
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection