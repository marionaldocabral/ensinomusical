<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Exercicios.
 *
 * @author  The scaffold-interface created at 2018-08-03 12:58:20am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Exercicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('exercicios',function (Blueprint $table){

        $table->increments('id');

        $table->integer('modulo');
        
        $table->integer('numero');
        
        $table->integer('pagina');
        
        $table->String('data')->nullable();
        
        $table->integer('aluno_id')->unsigned();
        
        $table->integer('instrutor_id')->unsigned()->nullable();

        $table->string('observacoes')->nullable();

        $table->foreign('aluno_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
    
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('exercicios');
    }
}
