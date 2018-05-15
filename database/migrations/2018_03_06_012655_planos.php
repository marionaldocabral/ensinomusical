<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Planos.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:26:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Planos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('planos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('ano');
        
        $table->integer('localidade_id')->unsigned();

        $table->foreign('localidade_id')
                    ->references('id')
                    ->on('localidades')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->integer('turma');
        
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
        Schema::drop('planos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
