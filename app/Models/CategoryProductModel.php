<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    use HasFactory;
    protected $table = "tbl_category_product";
    protected $primaryKey = "category_id";
    public $timestamps = false;
    protected $fillable = [
        "category_name",
        "category_desc",
        "category_status",
        "meta_keywords",
    ];
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
