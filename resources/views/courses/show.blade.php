
@extends('layouts.app')

@section('title', 'Detail Kursus - KursusKu')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            <h2 class="fw-bold mb-4">Detail Kursus</h2>

            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama Kursus</th>
                    <td>{{ $course->title }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $course->slug }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $course->description ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format((float) $course->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Durasi</th>
                    <td>{{ $course->duration }} hari</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $course->start_date ? $course->start_date->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($course->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
            </table>

            <a href="{{ route('courses.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('courses.edit', $course->id) }}"
               class="btn btn-primary">
                Edit Kursus
            </a>

        </div>
    </div>

</div>
@endsection
