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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('ap_paterno',75);
            $table->string('ap_materno',75);
            $table->string('fecha_nacimiento',10);
            $table->string('direccion',150);
            $table->string('colonia',75);
            $table->string('cp',10);
            $table->string('telefono',10);
            $table->double('capacidad',8,2);
            $table->string('credencial1',250);
            $table->string('credencial2',250);
            $table->string('baja',1);
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
        Schema::dropIfExists('customers');
    }
};
