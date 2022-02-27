<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo')->unique();
            $table->integer('km');
            $table->integer('averias');
            $table->string('descripcionAveria');
            //$table->boolean('arreglado',true);
            $table->string('estado');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            //Establecer la relación entre las tablas:
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
