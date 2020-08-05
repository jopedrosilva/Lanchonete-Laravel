<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $fillable = ['nome', 'preco',];
   
    public function search($filter = null){
        $results = $this-> where(function ($query) use ($filter){
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");

                }
        })//->toSql();
        ->paginate();

        return $results;
    }
    
}
