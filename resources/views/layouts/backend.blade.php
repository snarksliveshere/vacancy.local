@extends('layouts.app')
@section('wrapper')
<div class="container my-3">
    <div class="row">
        <div class="col-md-3">@include('partitials.nav.backend')</div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@endsection

