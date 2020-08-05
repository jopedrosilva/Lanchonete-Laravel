<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $fillable = ['nome', 'preco',];
    public function up()
    {
        //protected $table = 'produtos';
        
    }
    
}
