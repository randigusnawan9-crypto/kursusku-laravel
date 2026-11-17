
@extends('layouts.app')

@section('title', 'Pendaftaran Peserta - KursusKu')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white p-3">
                <h4 class="mb-0">Form Pendaftaran Kursus</h4>
            </div>

            <div class="card-body p-4">

                <p class="text-muted mb-4">
                    Pilih peserta dan kursus yang ingin diikuti.
                </p>

                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Peserta --}}
                    <div class="mb-3">
                        <label for="participant_id" class="form-label fw-semibold">
                            Peserta
                        </label>

                        <select
                            name="participant_id"
                            id="participant_id"
                            class="form-select @error('participant_id') is-invalid @enderror"
                        >
                            <option value="">-- Pilih Peserta --</option>

                            @foreach ($participants as $participant)
                                <option
                                    value="{{ $participant->id }}"
                                    {{ old('participant_id') == $participant->id ? 'selected' : '' }}
                                >
                                    {{ $participant->name }} - {{ $participant->email }}
                                </option>
                            @endforeach
                        </select>

                        @error('participant_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pilih Kursus --}}
                    <div class="mb-3">
                        <label for="course_id" class="form-label fw-semibold">
                            Kursus
                        </label>

                        <select
                            name="course_id"
                            id="course_id"
                            class="form-select @error('course_id') is-invalid @enderror"
                        >
                            <option value="">-- Pilih Kursus --</option>

                            @foreach ($courses as $course)
                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}
                                >
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            Simpan Pendaftaran
                        </button>

                        <a href="{{ route('enrollments.index') }}"
                           class="btn btn-outline-secondary">
                            Lihat Pendaftaran
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
