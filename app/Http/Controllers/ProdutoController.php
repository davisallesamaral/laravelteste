<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use estoque\Produto;

class ProdutoController extends Controller
{

    public function lista(){

        $produtos = Produto::all();

        return  view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id){

        $resposta = Produto::find($id);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta);
    }

    public function form($id){
        $resposta = Produto::find($id);
        return view('produto.formulario')->with('p', $resposta);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Nerd::find($id);
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('nerds');
        }
    }

    public function updateInsert($id){

        /*$produto = new Produto();
        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');*/

        /*$params = Request::all();
        $produto = new Produto($params);
        $produto->save();*/

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'valor'      => 'required|numeric',
            'quantidade' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('nerds/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
                if (!empty($id)){ 
                    $produtos = Produto::find($id);
                    $produtos->nome       = Input::get('nome');
                    $produtos->valor      = Input::get('valor');
                    $produtos->descricao  = Input::get('descricao');
                    $produtos->quantidade  = Input::get('quantidade');            
                    $produtos->save();
                }else{
                    Produto::create(Request::all());
                }
        }        
    
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }

}
