<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_password',
        'customer_phone',
        'customer_vip',
    ];
}
