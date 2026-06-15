<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Carrousel extends Model
{
    protected $table = 'carrousels';

    protected $fillable = ['titulo', 'slug', 'desc', 'is_Active'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'carrousel_product');
    }
}
