<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
   // use SoftDeletes;
	protected $connection = 'mysql';
    protected $fillable = ['buyer_code','name', 'email','phone','address'];
}
