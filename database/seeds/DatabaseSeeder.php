<?php

use Illuminate\Database\Seeder;
use estoque\Categoria;
use estoque\tipo;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategoriaTableSeeder');
        $this->call('TipoTableSeeder');    
    }
}

class CategoriaTableSeeder extends Seeder {
    public function run()
    {
        Categoria::create(['name' => 'ELETRODOMESTICO']);
        Categoria::create(['name' => 'ELETRONICA']);
        Categoria::create(['name' => 'BRINQUEDO']);
        Categoria::create(['name' => 'ESPORTES']);
    } 
    
}

class TipoTableSeeder extends Seeder {
    public function run()
    {
        Tipo::create(['name' => 'Tipo3']);
        Tipo::create(['name' => 'Tipo4']);
        Tipo::create(['name' => 'Tipo5']);
        Tipo::create(['name' => 'Tipo6']);
   } 
  
}   


