<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('nascimento');
            $table->string('status');
            $table->string('responsavel')->nullable();
            $table->string('contato_resp')->nullable();
            $table->integer('localidade_id')->unsigned();
            $table->foreign('localidade_id')
                    ->references('id')
                    ->on('localidades')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')
                    ->references('id')
                    ->on('planos')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->string('instrumento')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
