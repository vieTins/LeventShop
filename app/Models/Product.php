<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_price',
        'product_desc',
        'product_content',
        'product_image',
        'product_status',
        'product_tags',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\CategoryProductModel', 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\BrandProduct', 'brand_id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\OrderDetails', 'product_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
