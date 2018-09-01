@extends('layouts.backend')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Email</th>
            <th>Статус публикации</th>
            <th>Ссылка</th>
            <th>Удалить</th>
        </tr>
        <tbody>
        @foreach($vacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->id }}</td>
                <td>{{ $vacancy->title }}</td>
                <td>{{ $vacancy->email }}</td>
                <td>{{ $vacancy->publish }}</td>
                <td><a href="{{ route('vacancy.show', $vacancy->id) }}">Перейти</a></td>
                <td> {{ Form::open(['route' => ['vacancy.destroy', $vacancy->id], 'method' => 'delete' ]) }}
                    <button onclick="return confirm('уверены?')" type="submit" class="delete btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    {{ Form::close() }}</td>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
@endsection

