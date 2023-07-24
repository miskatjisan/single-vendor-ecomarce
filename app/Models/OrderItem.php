<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class OrderItem extends Model
{
    use HasFactory;
    protected $table='orders_items';
    protected $fillable=
    [
        'order_id',
        'prod_id',
        'price',
        'qty'
];
    
public function product(): BelongsTo
{
    return $this->belongsTO(Product::class, 'prod_id', 'id');
}
    
}
