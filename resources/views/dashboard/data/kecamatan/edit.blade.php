@extends('layouts.dashboard')
@section('title', 'Edit Kecamatan')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Edit Data</h5>
            {{-- @include('layouts.dashboard_partial.flashmessage') --}}
            <form class="row g-3" action="{{ route('dashboard.datamaster.kecamatan.store', $kecamatan->slug) }}" method="POST">
                @csrf
                <input type="hidden" name="slug" value="{{ $kecamatan->slug }}">
                <div class="col-12">
                    <label for="name" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="name" name="name"
                        {{ $errors->has('name') ? 'is-invalid' : '' }} value="{{ $kecamatan->name }}">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control select2" name="desa" >
                            @foreach ($kecamatan->desa as $desa)
                            <option value="{{ $kecamatan->id }}" selected>{{ $desa->name }}</option>
                            @endforeach
                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="{{ route('dashboard.datamaster.kecamatan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
</div>

@endsection
