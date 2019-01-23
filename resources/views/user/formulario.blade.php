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
    <h1>Novo produto</h1>

    <form action="/users/insert" method="post">

        <input type="hidden"
               name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="name" class="form-control" value="{{ old('name') }}"/>
        </div>
        <div class="form-group">
            <label>email</label>
            <input name="email" class="form-control" value="{{ old('email') }}"/>
        </div>
        <div class="form-group">
            <label>password</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}"/>
        </div>
        <div class="form-group">
            <label>remember_token</label>
            <input type="number" name="remember_token" class="form-control" value="{{ old('remember_token') }}"/>
        </div> 
        <button type="submit"
                class="btn btn-primary btn-block">Adicionar</button>
    </form>

@stop