<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'tbl_slider';
    protected $primaryKey = 'slider_id';
    public $timestamps = false;
    protected $fillable = [
        'slider_name',
        'slider_image',
        'slider_desc',
        'slider_status',
    ];
}
