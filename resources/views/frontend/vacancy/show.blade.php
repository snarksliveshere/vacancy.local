@extends('layouts.frontend')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-header">{{ $vacancy->title }}</h2>
            <h3 class="text-muted">Автор: {{ $vacancy->users->name }}</h3>
            <p class="card-subtitle my-3 text-muted">Email: {{ $vacancy->email }}, Дата публикации: {{ $vacancy->getDate() }}</p>
            <p class="card-text mb-2">Описание: {{ $vacancy->description }}</p>
        </div>
    </div>
@endsection
