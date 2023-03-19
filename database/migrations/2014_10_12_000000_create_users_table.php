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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',150);
            $table->string('ap_paterno',75);
            $table->string('ap_materno',100);
            $table->string('email',150)->unique();
            $table->string('username',150)->unique();
            $table->string('password',200);
            $table->string('baja',1);
            $table->foreignId('role_id')->constrined('roles','role_id');
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
        Schema::dropIfExists('users');
    }
};
