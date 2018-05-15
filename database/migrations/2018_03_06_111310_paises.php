<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Paises.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:13:10am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Paises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('paises',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nome');
        
        $table->String('sigla');
        
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
        Schema::drop('paises');
    }
}
