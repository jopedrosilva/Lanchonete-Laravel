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
            $table->increments('ID_Pedido');
            $table->integer('codigo_Cliente')->unsigned();
            $table->foreign('codigo_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
            $table->integer('codigo_Produto')->unsigned();
            $table->foreign('codigo_Produto')->references('ID_Produto')->on('produtos')->onDelete('cascade');
            $table->date('date');
            $table->enum('status_Pedido', ['Pendente', 'Em preparo', 'Em entrega', 'Entregue', 'Cancelado']);
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
