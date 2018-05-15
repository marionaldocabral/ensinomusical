<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Instrumentos.
 *
 * @author  The scaffold-interface created at 2018-03-18 10:17:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Instrumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('instrumentos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nome')->unique();
        
        $table->String('categoria');
        
        $table->String('tipo');
        
        $table->String('voz');
        
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
        Schema::drop('instrumentos');
    }
}
