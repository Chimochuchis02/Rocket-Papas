<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iluminate\Database\Eloquent\Relations\belongsTo;
class Promotion extends Model
{
    protected $table ='promotions';
    protected $fillable = ['id_products', 'is_Active', 'start_date', 'end_date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }
    
}
