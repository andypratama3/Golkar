@extends('layouts.dashboard')
@section('title', 'Tambah Peserta')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <input type="text" class="form-control" id="name" name="nik"
                        {{ $errors->has('nik') ? 'is-invalid' : '' }} value="{{ old('nik') }}">
                    @if ($errors->has('nik'))
                    <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">Nomor hp</label>
                    <input type="text" class="form-control" id="name" name="hp"
                        {{ $errors->has('hp') ? 'is-invalid' : '' }} value="{{ old('hp') }}">
                    @if ($errors->has('hp'))
                    <div class="invalid-feedback">{{ $errors->first('hp') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Kecamatan</label>
                        <select class="form-control select2" name="kecamatan" id="kecamatan">
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
                        <select class="form-control select2" name="desa" id="desa">
                            <option selected="selected">Pilih Desa</option>
                                {{-- @foreach ($kecamatan->desa as $desa) --}}
                                    {{-- <option value="{{ $desa->id }}">{{ $desa->name }}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Tps</label>
                        <select class="form-control select2" name="tps" id="tps">
                            <option selected="selected">Pilih Tps</option>
                            {{-- @foreach ($tpss as $tps) --}}
                            {{-- <option value="{{ $tps->id }}">{{ $tps->name }}</option> --}}
                            {{-- @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Warna</label>
                        <select name="" id="" class="form-control text-center">
                            <option selected>Pilih Warna</option>
                            <option value="" style="background-color: red;">Merah (Tidak Meilih)</option>
                            <option value="" style="background-color: gray;">Abu Abu (Ragu Ragu)</option>
                            <option value="" style="background-color: yellow;">Kuning (Memilih)</option>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('#kecamatan').on('change', function (){
            let id_kecamatan = $('#kecamatan').val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                type: "POST",
                url: "get/desa",
                data: {id_kecamatan: id_kecamatan},
                cache: false,
                success: function (response) {
                    $('#desa').html(response);
                    $('#tps').html('');
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
