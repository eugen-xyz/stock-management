<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table        = 'order_items';
    protected $primaryKey   = 'order_item_id';
    protected $fillable     = ['product_name', 'reference', 'unit_price', 'quantity', 'sub_total'];
}
