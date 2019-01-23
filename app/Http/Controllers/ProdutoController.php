<?php namespace estoque\Http\Controllers;

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', 
        ['only' => ['form', 'remove']]);
    }


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

    public function edit($id){
        $resposta = Produto::find($id);
        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.formularioEdit')->with('p', $resposta);
    }
    public function update($id, ProdutosRequest $request){
        $produto = Produto::find($id);
        $params = Request::all();// carrega informações digitadas na view
        $produto->update($params);
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nomeAlt'));
    }
    public function form(){
        return view('produto.formulario');
    }
    public function insert(ProdutosRequest $request){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        Produto::create(Request::all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }
    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }



}