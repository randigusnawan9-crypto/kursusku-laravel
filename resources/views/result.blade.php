
@extends('layouts.app')

@section('title', 'Hasil Pendaftaran - KursusKu')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                {{-- Header --}}
                <div class="card-header bg-success text-white py-3">
                    <h1 class="h4 mb-0">Pendaftaran Berhasil</h1>
                </div>

                <div class="card-body p-4">

                    {{-- Pesan Berhasil --}}
                    <div class="alert alert-success">
                        Data pendaftaran berhasil diproses!
                    </div>

                    <h2 class="h5 mb-3">Ringkasan Pendaftaran</h2>

                    {{-- Data Pendaftaran --}}
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 40%">Nama Lengkap</th>
                                <td>{{ $registration['name'] }}</td>
                            </tr>

                            <tr>
                                <th>Alamat Email</th>
                                <td>{{ $registration['email'] }}</td>
                            </tr>

                            <tr>
                                <th>Kursus</th>
                                <td>{{ $registration['course_name'] }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Tombol --}}
                    <div class="d-flex flex-wrap gap-2 mt-4">

                        <a href="{{ route('register') }}"
                           class="btn btn-primary">
                            Daftar Lagi
                        </a>

                        <a href="{{ route('home') }}"
                           class="btn btn-outline-secondary">
                            Kembali ke Beranda
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
