@extends('layouts.app')
@section('nav')
    <div class="container">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('admin') }}">Admin</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
    </div>
@endsection


