<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable = array('nome', 
    'descricao', 'valor', 'quantidade');

    protected $guarded = ['id'];  // impedir que o usuário altere o id de seu modelo. 

}
