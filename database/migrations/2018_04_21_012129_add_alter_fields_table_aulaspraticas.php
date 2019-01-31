<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlterFieldsTableAulaspraticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aulaspraticas', function (Blueprint $table) {
             $table->string('metodo');
             $table->integer('pagina');
             $table->integer('licao');
             $table->integer('instrutor_id')->unsigned();
             $table->foreign('instrutor_id')
                ->references('id')
                ->on('users')
                ->onUpdate('restrict');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aulaspraticas', function (Blueprint $table) {
        });
    }
}
