@extends('layouts.dashboard')
@section('title', 'Maps')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="form-group">
            <h2 class="text-center font-bold">Maps</h2>
            <iframe
                width="450"
                height="250"
                frameborder="0" style="border:0"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/MAP_MODE?key=YOUR_API_KEY&PARAMETERS"
                allowfullscreen>
        </iframe>
        </div>
    </div>
</div>
@endsection
