<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Hinos.
 *
 * @author  The scaffold-interface created at 2018-04-21 12:45:43am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Hinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('hinos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('data');
        
        $table->integer('numero');
        
        $table->integer('voz');
        
        $table->boolean('status');
        
        $table->integer('finalidade');
        
        $table->String('observacao')->nullable();
        
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
        Schema::drop('hinos');
    }
}
