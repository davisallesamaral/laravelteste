@extends('layout.principal')
@section('conteudo')

@if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
    </div>
@endif
    <h1>Editar Usuário {{$p->name}}</h1>

    <form action="/users/update/{{$p->id}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="name" class="form-control" value="{{$p->name}}">
        </div>
        <button type="submit" class="btn btn-success">Alterar</button>
    </form>

@stop