@extends('layout.principal')

@section('conteudo')
    <h1>Detalhes do produto: {{$p->name}}</h1>

    <ul>
        <li>
            <b>email:</b> R$ {{$p->email}}
        </li>
        <li>
            <b>password:</b>  {{$p->password}}
        </li>
        <li>
            <b>remember_token:</b> {{$p->remember_token}}
        </li>
        <li>
            <b>created_at:</b> {{$p->created_at}}
        </li>
        <li>
            <b>updated_at:</b> {{$p->updated_at}}
        </li>                
    </ul>
@stop