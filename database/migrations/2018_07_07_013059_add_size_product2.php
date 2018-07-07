<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSizeProduct2 extends Migration
{
    public function up()
    {
        Schema::table('produtos', function($table) {
            $table->string('tipo', 100);
        });
    }

    public function down()
    {
        Schema::table('produtos', function($table) {
            $table->dropColumn('tipo');
        });
    }
}
