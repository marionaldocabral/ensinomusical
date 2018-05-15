<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Chamadas.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:34:45am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Chamadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('chamadas',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('aula_id')->unsigned();

        $table->foreign('aula_id')
                    ->references('id')
                    ->on('aulasteoricas')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->integer('user_id')->unsigned();

         $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->boolean('status');
        
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
        Schema::drop('chamadas');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
