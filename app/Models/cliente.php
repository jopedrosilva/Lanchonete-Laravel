<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = ['nome', 'email', 'telefone', 'endereco',];

   
    /*public function search($filter = null){
        $results = $this-> where(function ($query) use ($filter){
            if ($filter) {
                $query->where('id', 'LIKE', "%{$filter}%");

                }
        })//->toSql();
        ->paginate();

        return $results;
    }*/
}