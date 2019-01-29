@extends('layout.principal')

@section('conteudo')

    @if(empty($tipos))
        <div class="alert alert-danger">
            Você não tem nenhum tipo cadastrado.
        </div>

    @else
        <h1>Listagem de Tipos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($tipos as $p)
                <tr>
                    <td> {{$p->id}} </td>
                    <td> {{$p->name}} </td>
                    <td>
                        <a href="/tipos/mostra/{{$p->id}}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('TipoController@remove', $p->id)}}"> 
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td> 
                        <a href="{{action('TipoController@edit', $p->id)}}"> 
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
            O tipo {{ old('name') }} foi adicionado.
        </div>
    @endif

@stop