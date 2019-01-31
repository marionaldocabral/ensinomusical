<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Exames.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:37:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Exames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('exames',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->String('categoria');
        
        $table->boolean('apto');
        
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::drop('exames');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
