<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model{
    protected $fillable = ['codigo_do_cliente', 'codigo_do_produto', 'data_de_criacao', 'status',];

    public function search_pedidos($id){
        $results = $this-> where(function ($query) use ($id){
            if (isset($id))
                $query->where('codigo_do_cliente', $id);

        })->paginate();

        return $results;
    }
}
