<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_do_cliente')->unsigned();
            $table->foreign('codigo_do_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('codigo_do_produto')->unsigned();
            $table->foreign('codigo_do_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->date('data_de_criacao');
            $table->enum('status', ['Pendente', 'Em preparo', 'Em entrega', 'Entregue', 'Cancelado']);
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
        Schema::dropIfExists('pedidos');
    }
}
