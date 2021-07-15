<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreBuyer extends Model
{
    protected $fillable = ['buyer_id','buyer_name', 'buyer_address','buyer_phone','buyer_mobile','buyer_fax','buyer_email'];
}
