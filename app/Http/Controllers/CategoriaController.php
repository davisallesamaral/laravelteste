<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use estoque\categoria;
use estoque\Http\Requests\CategoriasRequest;

class categoriaController extends Controller
{
    public function lista(){
        $categoria = categoria::all();
        return  view('categoria.listagem')->with('categorias', $categoria);
    }

    public function mostra($id){
        $resposta = categoria::find($id);
        if(empty($resposta)) {
            return "Esse usuário não existe";
        }
        return view('categoria.detalhes')->with('p', $resposta);
    }

    public function edit($id){
        $resposta = categoria::find($id);
        if(empty($resposta)) {
            return "Esse categoria não existe";
        }
        return view('categoria.formularioEdit')->with('p', $resposta);
    }

    public function update($id, CategoriasRequest $request){
        $categoria = categoria::find($id);
        $params = Request::all();// carrega informações digitadas na view
        $categoria->update($params);
        return redirect()->action('categoriaController@lista')->withInput(Request::only('nomeAlt'));
    }

    public function form(){
        return view('categoria.formulario');
    }

    public function insert(CategoriasRequest $request){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        categoria::create(Request::all());
        return redirect()
            ->action('CategoriaController@lista')
            ->withInput(Request::only('name'));
    }

    public function listaJson(){
        $categorias = categoria::all();
        return response()->json($categorias);
    }

    public function remove($id){
        $categoria = categoria::find($id);
        $categoria->delete();
        return redirect()
            ->action('categoriaController@lista');
    }

}
