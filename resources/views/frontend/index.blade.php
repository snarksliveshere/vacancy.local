@extends('layouts.frontend')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Заголовок</th>
                <th>Email</th>
                <th>Дата публикации</th>
                <th>Автор</th>
                <th>Ссылка</th>
            </tr>
            <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{ $vacancy->title }}</td>
                    <td>{{ $vacancy->email }}</td>
                    <td>{{ $vacancy->updated_at }}</td>
                    <td>{{ $vacancy->users->name }}</td>
                    <td><a href="{{ route('frontend.vacancies.show', $vacancy->id) }}">Перейти</a></td>
                </tr>
            @endforeach
            </tbody>
            </thead>
        </table>
    </div>
@endsection
