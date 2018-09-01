@extends('layouts.backend')
@section('content')
    <h1>Прветствую, {{Auth::user()->name}}</h1>
@endsection

