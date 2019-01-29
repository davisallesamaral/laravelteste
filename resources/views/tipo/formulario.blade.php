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
    <h1>Novo Categoria</h1>

    <form action="/tipos/insert" method="post">

        <input type="hidden"
               name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="name" class="form-control" value="{{ old('name') }}"/>
        </div>
         <button type="submit"
                class="btn btn-primary btn-block">Adicionar</button>
    </form>

@stop