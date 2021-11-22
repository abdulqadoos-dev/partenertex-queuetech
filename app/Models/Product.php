<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name', 'description', 'unit_sale_price', 'unit_buy_price', 'stock', 'sku', 'upc', 'dimension', 'puf', 'vatelian', 'metraj','material'];

    public function bundles()
    {
        return $this->belongsToMany(Bundle::class);
    }
}
