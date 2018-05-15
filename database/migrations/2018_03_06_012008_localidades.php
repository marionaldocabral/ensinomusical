<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Localidades.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:20:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Localidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('localidades',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nome');
        
        $table->integer('cidade_id')->unsigned();

        $table->foreign('cidade_id')
                    ->references('id')
                    ->on('cidades')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        
        $table->integer('enc_reg_id')->nullable();
        
        $table->integer('enc_local_id')->nullable();
        
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
        Schema::drop('localidades');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
