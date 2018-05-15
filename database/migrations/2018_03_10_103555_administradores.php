<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Administradores.
 *
 * @author  The scaffold-interface created at 2018-03-10 10:35:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Administradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('administradores',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
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
        Schema::drop('administradores');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
