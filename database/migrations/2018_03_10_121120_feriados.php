<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Feriados.
 *
 * @author  The scaffold-interface created at 2018-03-13 12:11:20am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Feriados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('feriados',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nome');
        
        $table->String('data');
        
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
        Schema::drop('feriados');
    }
}
