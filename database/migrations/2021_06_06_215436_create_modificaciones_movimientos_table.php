<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificacionesMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modificaciones_movimientos', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->double('monto', 20, 4);
            $table->string('titulo', 45);
            $table->string('descripcion', 255);
            $table->binary('imagen');
            $table->boolean('tipo_movimiento');
            //fk 1
            $table->integer('movimiento_id')->nullable();
            $table->foreign('movimiento_id')->references('id')->on('movimientos');
            //fk 2
            $table->integer('movimiento_dinero_id')->nullable();
            $table->foreign('movimiento_dinero_id')->references('dinero_principal_id')->on('movimientos');
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
        Schema::table('modificaciones_movimientos', function (Blueprint $table) {
            //drop for fk1
            $table->dropForeign('modificaciones_movimientos_movimiento_id_foreign');
            $table->dropColumn('movimiento_id');
            //drop for fk2
            $table->dropForeign('modificaciones_movimientos_movimiento_dinero_id_foreign');
            $table->dropColumn('movimiento_dinero_id');
        });
        Schema::dropIfExists('modificaciones_movimientos');

    }
}
