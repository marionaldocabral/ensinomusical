<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Cidades.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Cidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('cidades',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('estado_id')->unsigned();

        $table->foreign('estado_id')
                    ->references('id')
                    ->on('estados')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('nome');
        
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
        Schema::drop('cidades');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
