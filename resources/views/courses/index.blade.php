
@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <span class="badge bg-primary mb-2">MILESTONE 10</span>
            <h2 class="fw-bold mb-2">Daftar Kursus</h2>
            <p class="text-muted mb-0">
                Kelola dan lihat semua kursus yang tersedia di KursusKu.
            </p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-primary px-4 py-2">
            + Tambah Kursus
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 px-4">
            <h5 class="fw-bold mb-0">Data Kursus</h5>
            <small class="text-muted">Daftar seluruh kursus KursusKu</small>
        </div>

        <div class="card-body p-4">

            @if ($courses->count() > 0)

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No.</th>
                                <th>Nama Kursus</th>
                                <th>Slug</th>
                                <th>Harga</th>
                                <th>Durasi</th>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $index => $course)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $course->title }}</td>
                                    <td>{{ $course->slug }}</td>
                                    <td>Rp {{ number_format((float) $course->price, 0, ',', '.') }}</td>
                                    <td>{{ $course->duration }} hari</td>
                                    <td>{{ $course->start_date?->format('d-m-Y') ?? '-' }}</td>
                                    <td>
                                        @if ($course->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="text-center py-5">
                    <div class="mb-3">
                        <span class="badge rounded-pill bg-primary p-3">
                            <span style="font-size: 24px;">📚</span>
                        </span>
                    </div>

                    <h5 class="fw-bold mb-2">Belum Ada Data Kursus</h5>

                    <p class="text-muted mb-4">
                        Belum ada kursus yang ditambahkan.
                        Silakan tambahkan kursus pertama kamu.
                    </p>

                    <a href="{{ route('courses.create') }}" class="btn btn-primary px-4">
                        + Tambah Kursus Sekarang
                    </a>
                </div>

            @endif

        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Total kursus:
            <strong>{{ $courses->count() }} data</strong>
        </small>

        <small class="text-muted">KursusKu - Milestone 10</small>
    </div>

</div>
@endsection
