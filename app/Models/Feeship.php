<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fee_city_id',
        'fee_district_id',
        'fee_ward_id',
        'fee_feeship',
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_fee_shipping';
    public function city()
    {
        // mỗi bản ghi trong bảng tbl_fee_shipping sẽ thuộc về 1 bản ghi trong bảng tbl_city
        return $this->belongsTo(City::class, 'fee_city_id');
    }
    public function district()
    {
        // mỗi bản ghi trong bảng tbl_fee_shipping sẽ thuộc về 1 bản ghi trong bảng tbl_province
        return $this->belongsTo(Province::class, 'fee_district_id');
    }
    public function ward()
    {
        // mỗi bản ghi trong bảng tbl_fee_shipping sẽ thuộc về 1 bản ghi trong bảng tbl_ward
        return $this->belongsTo(Ward::class, 'fee_ward_id');
    }
}
