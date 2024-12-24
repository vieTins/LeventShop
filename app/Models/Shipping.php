<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    public $timestamps = false;
    protected $fillable = [
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_method',
        'shipping_notes',
        'shipping_zipcode'
    ];
}
