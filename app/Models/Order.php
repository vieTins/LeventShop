<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'order_status',
        'order_date',
        'order_code',
    ];
}
