<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iluminate\Database\Eloquent\Relations\HasOne;
use Iluminate\Database\Eloquent\Relations\belongsToMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillabe = ['nombre', 'desc', 'precio', 'image_path', 'type'];

    public function dish()
    {
        return $this->hasOne(Dish::class, 'id');
    }

    public function promotion()
    {
        return $this->hasOne(Promotion::class, 'id');
    }

    public function carrousel()
    {
        return $this->belongsToMany(Carrousel::class, 'carrousel_product');
    }
}
