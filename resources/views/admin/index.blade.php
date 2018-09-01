@extends('layouts.backend')
@section('content')
    <h1>тест админ страница
        {{Auth::user()->name}}
    </h1>
@endsection

