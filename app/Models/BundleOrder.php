<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleOrder extends Model
{
    use HasFactory;
    protected $table = 'bundle_order';
    protected $fillable = ['bundle_id', 'order_id', 'quantity'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
