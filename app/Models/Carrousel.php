<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Carrousel extends Model
{
    protected $table = 'carrousels';

    protected $fillable = ['titulo', 'imgs','model_3D_path', 'producto_id'];
    protected $casts = ['imgs' => 'array'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'carrousel_product');
    }
}
