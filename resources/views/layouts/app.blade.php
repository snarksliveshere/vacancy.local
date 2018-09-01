<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partitials.head')
<body>
@include('partitials.header')
@yield('wrapper')
@include('partitials.footer')
</body>
</html>
