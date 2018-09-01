<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partitials.head')
<body>
@include('partitials.header')
@include('partitials.session_status')
@yield('wrapper')
@include('partitials.footer')
</body>
</html>
