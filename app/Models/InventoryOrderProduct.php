<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOrderProduct extends Model
{
    use HasFactory;
    protected $table = 'inventory_order_products';
    protected $fillable = ['order_id', 'name', 'quantity', 'length', 'width', 'height', 'unit'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'inventory_orders');
    }
}
