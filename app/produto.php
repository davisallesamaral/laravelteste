<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable = array('nome', 
    'descricao', 'valor', 'quantidade', 'tamanho', 'categoria_id', 'tipo_id');

    protected $guarded = ['id'];  // impedir que o usuário altere o id de seu modelo. 

    public function categoria(){
        return $this->belongsTo('estoque\Categoria');
    }

    public function tipo(){
        return $this->belongsTo('estoque\Tipo');
    }
}    

