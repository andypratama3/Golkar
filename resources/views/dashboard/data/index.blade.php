@extends('layouts.dashboard')
@section('title', 'Data')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Data</a>
                    </h5>
                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kecamatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatans as $kecamatan)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td><a href="{{ route('dashboard.data.kecamatan', $kecamatan->name) }}">{{ $kecamatan->name }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
