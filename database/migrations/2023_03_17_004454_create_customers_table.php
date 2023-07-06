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
            $table->string('nombres',100)->nullable()->default('');
            $table->string('ap_paterno',75)->nullable()->default('');
            $table->string('ap_materno',75)->nullable()->default('');
            $table->string('fecha_nacimiento',10)->nullable()->default('');
            $table->string('calle',150)->nullable()->default('');
            $table->string('numero_exterior',10)->nullable()->default('');
            $table->string('colonia',75)->nullable()->default('');
            $table->string('cp',10)->nullable()->default('');
            $table->string('ciudad',75)->nullable()->default('');
            $table->string('estado',75)->nullable()->default('');
            $table->string('telefono',10)->nullable()->default('');
            $table->double('capacidad',8,2)->nullable()->default(0);
            $table->string('credencial1',250)->nullable()->default('');
            $table->string('credencial2',250)->nullable()->default('');
            $table->string('baja',1)->nullable()->default('');
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
