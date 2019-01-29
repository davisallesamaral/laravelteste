@extends('layout.principal')

@section('conteudo')

    @if(empty($categorias))
        <div class="alert alert-danger">
            Você não tem nenhuma categoria cadastrada.
        </div>

    @else
        <h1>Listagem de categorias</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($categorias as $p)
                <tr>
                    <td> {{$p->id}} </td>
                    <td> {{$p->name}} </td>
                    <td>
                        <a href="/categorias/mostra/{{$p->id}}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('CategoriaController@remove', $p->id)}}"> 
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('CategoriaController@edit', $p->id)}}"> 
                          <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>                    
                </tr>
            @endforeach
        </table>
    @endif

    @if(old('name'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            O Usuário {{ old('name') }} foi adicionado.
        </div>
    @endif

@stop