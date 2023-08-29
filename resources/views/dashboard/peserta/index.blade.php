@extends('layouts.dashboard')
@section('title', 'Desa')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Data Peserta
                        <a href="{{ route('dashboard.peserta.create') }}" class="btn btn-sm btn-primary"
                            style="float: right;">Tambah Data</a>
                    </h5>

                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Hp</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Desa</th>
                                <th scope="col">TPS</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
