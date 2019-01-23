@extends('layout.principal')

@section('conteudo')

    @if(empty($users))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>

    @else
        <h1>Listagem de users</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($users as $p)
                <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}">
                    <td> {{$p->nome}} </td>
                    <td> {{$p->email}} </td>
                    <td>
                        <a href="/users/mostra/{{$p->id}}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('UserController@remove', $p->id)}}"> 
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('UserController@edit', $p->id)}}"> 
                          <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>                    
                </tr>
            @endforeach
        </table>
    @endif

    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            O Usuário {{ old('nome') }} foi adicionado.
        </div>
    @endif

@stop