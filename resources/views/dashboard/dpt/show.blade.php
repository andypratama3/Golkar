@extends('layouts.dashboard')
@section('title', 'Tambah Dpt')
@section('content')
<div class="col-lg-12 text-center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">VIEW FILE PDF</h5>
        <div class="col-12">
            <div class="form-group">
                <h2>{{ $dpt->name }}</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <iframe src="{{ asset('storage/file/dpt/' . $dpt->file) }}" style="width: 100%; height: 100vh"></iframe>
            </div>
        </div>
        <div class="text-center mb-2">
            <a href="{{ route('dashboard.dpt.index') }}" class="btn btn-danger float-lg-start">Kembali</a>
        </div>
        </form>
    </div>
</div>
@endsection
