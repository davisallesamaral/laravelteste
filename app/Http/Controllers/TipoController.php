<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use estoque\tipo;
use estoque\Http\Requests\TiposRequest;

class TipoController extends Controller
{
    public function lista(){
        $tipo = tipo::all();
        return  view('tipo.listagem')->with('tipos', $tipo);
    }

    public function mostra($id){
        $resposta = tipo::find($id);
        if(empty($resposta)) {
            return "Esse usuário não existe";
        }
        return view('tipo.detalhes')->with('p', $resposta);
    }

    public function edit($id){
        $resposta = tipo::find($id);
        if(empty($resposta)) {
            return "Esse tipo não existe";
        }
        return view('tipo.formularioEdit')->with('p', $resposta);
    }

    public function update($id, tiposRequest $request){
        $tipo = tipo::find($id);
        $params = Request::all();// carrega informações digitadas na view
        $tipo->update($params);
        return redirect()->action('TipoController@lista')->withInput(Request::only('nomeAlt'));
    }

    public function form(){
        return view('tipo.formulario');
    }

    public function insert(tiposRequest $request){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        tipo::create(Request::all());
        return redirect()
            ->action('TipoController@lista')
            ->withInput(Request::only('name'));
    }

    public function listaJson(){
        $tipos = tipo::all();
        return response()->json($tipos);
    }

    public function remove($id){
        $tipo = tipo::find($id);
        $tipo->delete();
        return redirect()
            ->action('TipoController@lista');
    }
}
