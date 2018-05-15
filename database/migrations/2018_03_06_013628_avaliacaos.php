<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Avaliacaos.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:36:28am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Avaliacaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('avaliacaos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('plano_id')->unsigned();

        $table->foreign('plano_id')
                    ->references('id')
                    ->on('planos')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->integer('modulo');
        
        $table->float('nota')->nullable();
        
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
        Schema::drop('avaliacaos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
