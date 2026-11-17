
@extends('layouts.app')

@section('title', 'Laporan Pendaftaran - KursusKu')

@section('content')
<div class="card border-0 shadow-sm">

    <div class="card-header bg-primary text-white p-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Laporan Pendaftaran Kursus</h4>

        <a href="{{ route('enrollments.create') }}" class="btn btn-light btn-sm text-primary">
            + Pendaftaran Baru
        </a>
    </div>

    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($enrollments->isEmpty())
            <div class="alert alert-info mb-0">
                Belum ada data pendaftaran kursus.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Nama Kursus</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enrollment->participant->name }}</td>
                                <td>{{ $enrollment->participant->email }}</td>
                                <td>{{ $enrollment->course->title }}</td>
                                <td>
                                    {{ $enrollment->course->start_date
                                        ? $enrollment->course->start_date->format('d-m-Y')
                                        : '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
</div>
@endsection
