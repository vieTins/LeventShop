<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_district',
        'type',
        'ma_city',
    ];
    protected $primaryKey = 'maqh';
    protected $table = 'tbl_district';
}
