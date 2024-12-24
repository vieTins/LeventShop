<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'tbl_gallery';
    protected $primaryKey = 'gallery_id';
    public $timestamps = false;
    protected $fillable = [
        'gallery_name',
        'gallery_image',
        'product_id',
    ];
}
