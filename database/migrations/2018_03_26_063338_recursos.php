<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Recursos.
 *
 * @author  The scaffold-interface created at 2018-03-26 06:33:38pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('recursos',function (Blueprint $table){

        $table->increments('id');

        $table->integer('aula_id')->unsigned();

        $table->foreign('aula_id')
                    ->references('id')
                    ->on('aulasteoricas')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('descricao');
        
        $table->String('link');
        
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
        Schema::drop('recursos');
    }
}
