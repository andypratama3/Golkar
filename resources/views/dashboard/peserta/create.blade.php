@extends('layouts.dashboard')
@section('title', 'Tambah Peserta')
@push('css')
<link href="{{ asset('assets_dashboard/css/select/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Tambah Data</h5>
            <form class="row g-3" action="{{ route('dashboard.peserta.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        {{ $errors->has('name') ? 'is-invalid' : '' }} value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Nik</label>
                    <input type="number" class="form-control" id="name" name="nik"
                        {{ $errors->has('nik') ? 'is-invalid' : '' }} value="{{ old('nik') }}">
                    @if ($errors->has('nik'))
                    <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="lahir" name="tgl_lahir"
                        {{ $errors->has('nik') ? 'is-invalid' : '' }} value="{{ old('tgl_lahir') }}">
                    @if ($errors->has('tgl_lahir'))
                    <div class="invalid-feedback">{{ $errors->first('tgl_lahir') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Nomor hp</label>
                    <input type="number" class="form-control" id="name" name="hp"
                        {{ $errors->has('hp') ? 'is-invalid' : '' }} value="{{ old('hp') }}">
                    @if ($errors->has('hp'))
                    <div class="invalid-feedback">{{ $errors->first('hp') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Kecamatan</label>
                        <select class="form-control select2" name="kecamatan_id" id="kecamatan">
                            <option selected="selected">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Desa</label>
                        <select class="form-control select2" name="desa_id" id="desa">
                            <option selected>Pilih Desa</option>

                        </select>
                        </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Tps</label>
                        <select class="form-control select2" name="tps_id" id="tps">
                            <option selected>Pilih Tps</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Alamat</label>
                    <textarea name="alamat" id="" cols="10" rows="2" class="form-control" {{ $errors->has('alamat') ? 'is-invalid' : '' }} value="{{ old('alamat') }}"></textarea>
                    @if ($errors->has('alamat'))
                    <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Warna</label>
                        <select name="warna" id="" class="form-control text-center">
                            <option selected>Pilih Warna</option>
                            <option value="merah" style="background-color: red;">Merah (Tidak Meilih)</option>
                            <option value="abu-abu" style="background-color: gray;">Abu Abu (Ragu Ragu)</option>
                            <option value="kuning" style="background-color: yellow;">Kuning (Memilih)</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="text-center mb-2">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form>
    </div>
</div>
@push('js')
<!-- Use -->
<script src="{{ asset('assets_dashboard/js/jquery-3.6.0.min.js') }}"></script>
<!-- Instead of -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="{{ asset('assets_dashboard/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $('.select2').select2();
        $('#kecamatan').on('change', function (){
            let id_kecamatan = $('#kecamatan').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.desa') }}",
                data: {id_kecamatan: id_kecamatan},
                cache: false,
                success: function (response) {
                    $('#desa').html(response);
                },
                error: function($data){
                    console.log('error', $data);
                }
            });
        });
        $('#desa').on('change', function (){
            let id_desa = $('#desa').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.tps') }}",
                data: {id_desa: id_desa},
                cache: false,
                success: function (response) {
                    $('#tps').html(response);
                },
                error: function($data){
                    console.log('error', $data);
                }
            });
        });

    });

</script>
@endpush
@endsection
