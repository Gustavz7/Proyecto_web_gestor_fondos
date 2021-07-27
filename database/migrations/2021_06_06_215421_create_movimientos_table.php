<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->bigInteger('monto');
            $table->string('titulo', 45);
            $table->string('descripcion', 255);
            $table->binary('imagen')->nullable();
            $table->boolean('tipo_movimiento');
            $table->boolean('editado');
            $table->integer('dinero_principal_id')->nullable();
            $table->foreign('dinero_principal_id')->references('id')->on('dinero_principals');
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
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropForeign('movimientos_dinero_principal_id_foreign');
            $table->dropColumn('dinero_principal_id');
        });
        Schema::dropIfExists('movimientos');

    }
}
