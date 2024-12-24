<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;
    protected $table = 'tbl_mail';
    protected $primaryKey = 'mail_id';
    protected $fillable = [
        'mail_to',
        'order_code',
        'mail_title',
        'mail_content',
    ];
}
