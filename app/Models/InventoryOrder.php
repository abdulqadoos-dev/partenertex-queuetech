<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOrder extends Model
{
    use HasFactory;
    protected $table = 'inventory_orders';
    protected $fillable = ['inventory_order_product_id', 'inventory_id'];
}
