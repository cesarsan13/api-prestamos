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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrined('customers','id');
            $table->string('fecha_inicio',10);
            $table->string('fecha_fin',10);
            $table->double('cantidad_prestada',8,2);
            $table->integer('duracion');
            $table->double('pago_semanal',8,2);
            $table->double('cantidad_restante',8,2);
            $table->double('abonado',8,2);
            $table->double('ganancia',8,2);
            $table->integer('estatus'); //1 activo 2 finalizado
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
        Schema::dropIfExists('prestamos');
    }
};
