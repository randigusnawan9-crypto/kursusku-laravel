
@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')
<div class="container py-5">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <span class="badge bg-primary mb-2">MILESTONE 13</span>
            <h2 class="fw-bold mb-2">Daftar Kursus</h2>
            <p class="text-muted mb-0">
                Kelola dan temukan kursus yang tersedia di KursusKu.
            </p>
        </div>

        <a href="{{ route('courses.create') }}"
           class="btn btn-primary px-4 py-2">
            + Tambah Kursus
        </a>
    </div>

    {{-- PESAN BERHASIL --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- CARD DATA KURSUS --}}
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        {{-- HEADER CARD --}}
        <div class="card-header bg-white border-bottom py-3 px-4">
            <h5 class="fw-bold mb-1">Data Kursus</h5>
            <small class="text-muted">
                Cari, filter, dan lihat daftar kursus KursusKu
            </small>
        </div>

        <div class="card-body p-4">

            {{-- FORM SEARCH DAN FILTER --}}
            <form action="{{ route('courses.index') }}"
                  method="GET"
                  class="mb-4">

                <div class="row g-3 align-items-end">

                    {{-- PENCARIAN --}}
                    <div class="col-md-6">
                        <label for="search" class="form-label fw-semibold">
                            Cari Kursus
                        </label>

                        <input type="text"
                               name="search"
                               id="search"
                               class="form-control"
                               placeholder="Cari nama atau deskripsi kursus..."
                               value="{{ $search ?? '' }}">
                    </div>

                    {{-- FILTER STATUS --}}
                    <div class="col-md-3">
                        <label for="status" class="form-label fw-semibold">
                            Status Kursus
                        </label>

                        <select name="status"
                                id="status"
                                class="form-select">

                            <option value="">Semua Status</option>

                            <option value="active"
                                {{ request('status') == 'active' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="inactive"
                                {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-3">
                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary flex-grow-1">
                                Cari
                            </button>

                            <a href="{{ route('courses.index') }}"
                               class="btn btn-outline-secondary">
                                Reset
                            </a>

                        </div>
                    </div>

                </div>
            </form>

            {{-- INFORMASI FILTER --}}
            @if (request('search') || request('status'))
                <div class="alert alert-info py-2">
                    <small>
                        Menampilkan hasil
                        @if (request('search'))
                            pencarian:
                            <strong>{{ request('search') }}</strong>
                        @endif

                        @if (request('status') == 'active')
                            | Status: <strong>Aktif</strong>
                        @elseif (request('status') == 'inactive')
                            | Status: <strong>Nonaktif</strong>
                        @endif
                    </small>
                </div>
            @endif

            {{-- TABEL DATA --}}
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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($courses as $index => $course)
                                <tr>

                                    {{-- NOMOR --}}
                                    <td>
                                        {{ $courses->firstItem() + $index }}
                                    </td>

                                    {{-- NAMA --}}
                                    <td class="fw-semibold">
                                        {{ $course->title }}
                                    </td>

                                    {{-- SLUG --}}
                                    <td>
                                        {{ $course->slug }}
                                    </td>

                                    {{-- HARGA --}}
                                    <td>
                                        Rp {{ number_format((float) $course->price, 0, ',', '.') }}
                                    </td>

                                    {{-- DURASI --}}
                                    <td>
                                        {{ $course->duration }} hari
                                    </td>

                                    {{-- TANGGAL --}}
                                    <td>
                                        {{ $course->start_date?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        @if ($course->is_active)
                                            <span class="badge bg-success">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>

                                    {{-- AKSI --}}
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- DETAIL --}}
                                            <a href="{{ route('courses.show', $course->id) }}"
                                               class="btn btn-info btn-sm text-white">
                                                Detail
                                            </a>

                                            {{-- EDIT --}}
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            {{-- HAPUS --}}
                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">

                    <div>
                        {{ $courses->links('pagination::bootstrap-5') }}
                    </div>

                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="text-center py-5">

                    <div class="mb-3">
                        <span class="badge rounded-pill bg-primary p-3">
                            <span style="font-size: 24px;">📚</span>
                        </span>
                    </div>

                    @if (request('search') || request('status'))

                        <h5 class="fw-bold mb-2">
                            Kursus Tidak Ditemukan
                        </h5>

                        <p class="text-muted mb-4">
                            Tidak ada kursus yang sesuai dengan pencarian
                            atau filter yang kamu pilih.
                        </p>

                        <a href="{{ route('courses.index') }}"
                           class="btn btn-outline-primary px-4">
                            Reset Pencarian
                        </a>

                    @else

                        <h5 class="fw-bold mb-2">
                            Belum Ada Data Kursus
                        </h5>

                        <p class="text-muted mb-4">
                            Belum ada kursus yang ditambahkan.
                            Silakan tambahkan kursus pertama kamu.
                        </p>

                        <a href="{{ route('courses.create') }}"
                           class="btn btn-primary px-4">
                            + Tambah Kursus Sekarang
                        </a>

                    @endif

                </div>

            @endif

        </div>
    </div>

       {{-- FOOTER --}}
    <div class="d-flex justify-content-end align-items-center flex-wrap mt-3">

        <small class="text-muted">
            KursusKu - Milestone 13
        </small>

    </div>

</div>
@endsection