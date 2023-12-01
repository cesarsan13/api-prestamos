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
        Schema::create('pago_prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_prestamo')->constrined('prestamos','id');
            $table->string("fecha_pago",10);
            $table->string("hora_pago",10);
            $table->double("monto",8,2);
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
        Schema::dropIfExists('pago__prestamos');
    }
};
