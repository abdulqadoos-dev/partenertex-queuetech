<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'employee_id', 'order_no', 'receipt_date', 'cutting_date', 'sewing_date', 'packing_date', 'delivery_date', 'delivery_method', 'status', 'notes', 'type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function bundles()
    {
        return $this->belongsToMany(Bundle::class)->withPivot('quantity');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function inventoryOrderProducts()
    {
        return $this->hasMany(InventoryOrderProduct::class);
    }
}
