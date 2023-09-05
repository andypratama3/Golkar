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
            <button class="btn btn-sm btn-success float-end" style="margin-top: 35px;" id="ceknik">Cek Nik</button>
            <form class="row g-3" action="{{ route('dashboard.peserta.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " id="name"
                        name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name" class="form-label" id="nik">NIK</label>
                        <input type="number" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}"
                            id="inputnik" name="nik" value="{{ old('nik') }}">
                        @if ($errors->has('nik'))
                        <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
                        @endif
                        <div id="messageBisa" style="color: green; font-size: 13px;"></div>
                        <div id="messageTidak" style="color: red; font-size: 13px;"></div>
                    </div>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control  {{ $errors->has('tgl_lahir') ? 'is-invalid' : '' }}"
                        id="lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                    @if ($errors->has('tgl_lahir'))
                    <div class="invalid-feedback">{{ $errors->first('tgl_lahir') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Nomor hp</label>
                    <input type="number" class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}" id="name"
                        name="hp" value="{{ old('hp') }}">
                    @if ($errors->has('hp'))
                    <div class="invalid-feedback">{{ $errors->first('hp') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Kecamatan</label>
                        <select class="form-control select2 {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}"
                            name="kecamatan" id="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}"
                                {{ old('kecamatan') == $kecamatan->id ? 'selected' : '' }}>
                                {{ $kecamatan->name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kecamatan'))
                        <div class="invalid-feedback">{{ $errors->first('kecamatan') }}</div>
                        @endif
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Desa</label>
                        <select class="form-control select2 {{ $errors->has('desa') ? 'is-invalid' : '' }}" name="desa"
                            id="desa">
                            {{ old('desa') }}
                        </select>
                        @if ($errors->has('desa'))
                        <div class="invalid-feedback">{{ $errors->first('desa') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Tps</label>
                        <select class="form-control select2 {{ $errors->has('tps') ? 'is-invalid' : '' }}" name="tps"
                            id="tps">
                            {{ old('tps') }}
                        </select>
                        @if ($errors->has('tps'))
                        <div class="invalid-feedback">{{ $errors->first('tps') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Alamat</label>
                    <textarea name="alamat" id="" cols="10" rows="2"
                        class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}">{{ old('alamat') }}</textarea>
                    @if ($errors->has('alamat'))
                    <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                    @endif

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Warna</label>
                        <select name="warna" id=""
                            class="form-control text-center {{ $errors->has('warna') ? 'is-invalid' : '' }}">
                            <option selected="selected" value="">Pilih Warna</option>
                            <option value="merah" style="background-color: red;">Merah (Tidak Meilih)</option>
                            <option value="abu-abu" style="background-color: gray;">Abu Abu (Ragu Ragu)</option>
                            <option value="kuning" style="background-color: yellow;">Kuning (Memilih)</option>

                        </select>
                        @if ($errors->has('warna'))
                        <div class="invalid-feedback">{{ $errors->first('warna') }}</div>
                        @endif
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
<script src="{{ asset('assets_dashboard/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#inputnik').on('change', function () {
            var nik = $(this).val(); // Get the value of the input field with id 'inputnik'
            if (nik.length > 16) { // Check if the length of 'nik' is greater than 16
                alert("Nik Tidak Boleh Lebih Dari 16 Karakter");

                $(this).val(''); // Clear the input field
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.select2').select2();
        $('#kecamatan').on('change', function () {
            let id_kecamatan = $('#kecamatan').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.desa') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                cache: false,
                success: function (response) {
                    $('#desa').html(response);
                    $('#desa').attr('value', response);

                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });
        });
        $('#desa').on('change', function () {
            let id_desa = $('#desa').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.tps') }}",
                data: {
                    id_desa: id_desa
                },
                cache: false,
                success: function (response) {
                    $('#tps').html(response);
                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });
        });
        $('#ceknik').click(function (e) {
            let input_nik = $('#nik').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.nik') }}",
                data: {
                    input_nik: input_nik,
                },
                cache: false,
                success: function (response) {
                    if (response.hasOwnProperty('bisa')) {
                        $('#messageBisa').html(response.bisa);
                    } else {
                        $('#messageTidak').html(response.tidak);
                    }
                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });
        });
    });

</script>

@endpush
@endsection
