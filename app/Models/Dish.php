<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';

    protected $fillable = ['id_products', 'is_Active'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }

}
