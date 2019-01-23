<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCampo1NoProduto extends Migration
{
    //php artisan migrate
    public function up()
    {
        Schema::table('produtos', function($table) {
            $table->string('campo', 100);
        });
    }

    //php artisan migrate:rollback
    public function down()
    {
        Schema::table('produtos', function($table) {
            $table->dropColumn('campo');
        });
    }
}
