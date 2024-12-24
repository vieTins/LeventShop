<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "tbl_comment";
    protected $primaryKey = "comment_id";
    protected $fillable = [
        'comment',
        'comment_name',
        'comment_date',
        'comment_product_id',
        'comment_parent_comment',
        'comment_status',
    ];
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'comment_product_id');
    }
}
