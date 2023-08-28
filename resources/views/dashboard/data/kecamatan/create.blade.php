@extends('layouts.dashboard')
@section('title', 'Tambah Kecamatan')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Tambah Data</h5>

            <form class="row g-3" action="{{ route('dashboard.datamaster.kecamatan.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="name" name="name"
                        {{ $errors->has('name') ? 'is-invalid' : '' }} value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control select2" name="desa">
                            <option selected="selected">Pilih Desa</option>
                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="text-center">
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
         $('.select2').select2()
     });
</script>
@endpush
@endsection
