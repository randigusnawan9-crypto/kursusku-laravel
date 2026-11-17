
@extends('layouts.app')

@section('title', 'Edit Kursus - KursusKu')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white p-3">
            <h4 class="mb-0">Edit Kursus</h4>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('courses.update', $course->id) }}"
                  method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kursus</label>
                    <input type="text" name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $course->title) }}">

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug"
                        class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug', $course->slug) }}">

                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="4">{{ old('description', $course->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $course->price) }}" min="0">

                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Durasi (hari)</label>
                        <input type="number" name="duration"
                            class="form-control @error('duration') is-invalid @enderror"
                            value="{{ old('duration', $course->duration) }}" min="1">

                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date"
                        class="form-control @error('start_date') is-invalid @enderror"
                        value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}">

                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check form-switch mb-4">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1"
                        class="form-check-input" id="is_active"
                        {{ old('is_active', $course->is_active) ? 'checked' : '' }}>

                    <label class="form-check-label" for="is_active">
                        Kursus aktif
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
