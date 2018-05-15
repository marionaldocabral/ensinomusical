<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Aulaspraticas.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:33:22am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aulaspraticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aulaspraticas',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('data');
        
        $table->boolean('apto');
        
        $table->String('observacao');
        
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
        Schema::drop('aulaspraticas');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
