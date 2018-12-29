<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',255);
            $table->string('apellidos',255);
            $table->integer('cargo_id')->unsigned();
            $table->text('direccion');
            $table->string('telefono',10);
            $table->timestamps();

            //Relaciones
            
            $table->foreign('cargo_id')->references('id')->on('cargos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
