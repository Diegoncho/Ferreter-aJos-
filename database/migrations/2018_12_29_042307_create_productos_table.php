<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->text('descripcion');
            $table->integer('marca_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('cantidad');
            $table->integer('proveedor_id')->unsigned();
            $table->float('precio_costo');
            $table->float('precio_venta');
            $table->timestamps();

            //Relaciones

            $table->foreign('marca_id')->references('id')->on('marcas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('categoria_id')->references('id')->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('proveedor_id')->references('id')->on('proveedores')
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
        Schema::dropIfExists('productos');
    }
}
