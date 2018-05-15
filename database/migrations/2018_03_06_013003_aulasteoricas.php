<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Aulasteoricas.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:30:03am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aulasteoricas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aulasteoricas',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('plano_id')->unsigned();

        $table->foreign('plano_id')
                    ->references('id')
                    ->on('planos')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('data');
        
        $table->integer('modulo');
        
        $table->integer('numero');
        
        $table->String('conteudo');
        
        /**
         * Foreignkeys section
         */
        
        
        
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::drop('aulasteoricas');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
