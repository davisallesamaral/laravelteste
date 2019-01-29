<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    public $timestamps = false;
    protected $fillable = array('name');

    protected $guarded = ['id'];  // impedir que o usuário altere o id de seu modelo. 

    public function produtos(){
        return $this->hasMany('estoque\Produto');
    }
}
