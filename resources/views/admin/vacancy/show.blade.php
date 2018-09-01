@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-header">{{ $vacancy->title }}</h2>
            <h6 class="card-subtitle my-3 text-muted">Email: {{ $vacancy->email }}</h6>
            <p class="card-text mb-2">Описание: {{ $vacancy->description }}</p>
            <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="card-link">Редактировать</a>
        </div>
    </div>
@endsection
