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
    <h1>Editar produto {{$p->nome}}</h1>

    <form action="/produtos/update/{{$p->id}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{$p->nome}}">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{$p->valor}}">
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control" value="{{$p->quantidade}}">
        </div>
        <div class="form-group">
            <label>Descricao</label>
            <textarea name="descricao" class="form-control">{{$p->descricao}}</textarea>
        </div>
        <div class="form-group">
            <label>Tamanho</label>
            <input name="tamanho" class="form-control" value="{{$p->tamanho}}"  required/>          
        </div>
        <div class="form-group">
            <label>Tipo</label>
            <input name="tipo" class="form-control"  value="{{$p->tipo}}" required/>  
        </div>   
        <button type="submit" class="btn btn-success">Alterar</button>
    </form>

@stop