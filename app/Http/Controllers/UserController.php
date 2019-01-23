<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use estoque\User;
use estoque\Http\Requests\UsersRequest;

class UserController extends Controller
{
    public function lista(){
        $user = User::all();
        return  view('user.listagem')->with('users', $user);
    }

    public function mostra($id){
        $resposta = User::find($id);
        if(empty($resposta)) {
            return "Esse usuário não existe";
        }
        return view('user.detalhes')->with('p', $resposta);
    }

    public function edit($id){
        $resposta = User::find($id);
        if(empty($resposta)) {
            return "Esse User não existe";
        }
        return view('User.formularioEdit')->with('p', $resposta);
    }
    public function update($id, UsersRequest $request){
        $user = User::find($id);
        $params = Request::all();// carrega informações digitadas na view
        $user->update($params);
        return redirect()->action('UserController@lista')->withInput(Request::only('nomeAlt'));
    }
    public function form(){
        return view('User.formulario');
    }
    public function insert(UsersRequest $request){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        User::create(Request::all());
        return redirect()
            ->action('userController@lista')
            ->withInput(Request::only('nome'));
    }
    public function listaJson(){
        $users = User::all();
        return response()->json($Users);
    }

    public function remove($id){
        $user = User::find($id);
        $user->delete();
        return redirect()
            ->action('UserController@lista');
    }

}
