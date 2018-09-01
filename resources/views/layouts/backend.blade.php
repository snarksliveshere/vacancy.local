@extends('layouts.app')
@section('wrapper')
<div class="container">
    <div class="row">
        <div class="col-md-3">NAVIGATIO</div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@endsection

