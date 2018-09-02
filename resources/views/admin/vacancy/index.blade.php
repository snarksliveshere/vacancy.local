@extends('layouts.backend')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Email</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Ссылка</th>
            <th>Удалить</th>
        </tr>
        <tbody>
        @foreach($vacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->id }}</td>
                <td>{{ $vacancy->title }}</td>
                <td>{{ $vacancy->email }}
                    @can('see', $vacancy)
                        <div class="border">
                            Id автора {{ $vacancy->users->id }}<br>
                            Имя автора: {{ $vacancy->users->name }}<br>
                        </div>
                    @endcan
                </td>
                <td>
                    @if($vacancy->publish === 0)
                        <i class="fas fa-lock btn-lg"></i>
                    @else
                        <i class="fas fa-check-circle btn-lg"></i>
                    @endif
                    {{ Form::close() }}
                </td>
                <td><a href="{{ route('vacancy.edit', $vacancy->id) }}"><i class="fas fa-edit btn-lg"></i></a></td>
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

