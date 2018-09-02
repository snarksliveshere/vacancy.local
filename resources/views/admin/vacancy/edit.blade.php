@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-body">
               {{ Form::open([
                   'route' => ['vacancy.update', $vacancy->id],
                   'method' => 'put'
               ]) }}
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title" value="{{ $vacancy->title }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Описание</label>
                    <div class="col-md-6">
                        <textarea id="name" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                               name="description">{{ $vacancy->description }}
                        </textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ $vacancy->email }}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                @can('see', $vacancy)
                    <div class="form-group row align-items-center">
                        <label class="col-md-4 col-form-label text-md-right" for="gridCheck">
                            Опубликовать
                        </label>
                        <div class="col-md-6">
                            {{ Form::checkbox('publish','1',$vacancy->publish,['class' => 'minimal', 'id' => 'gridCheck']) }}
                        </div>
                    </div>
                @endcan
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Редактировать
                        </button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
