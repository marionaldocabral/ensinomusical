<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Estados.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('estados',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('pais_id')->unsigned();

        $table->foreign('pais_id')
                    ->references('id')
                    ->on('paises')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::drop('estados');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
