<?php

namespace App\Hrm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    //use SoftDeletes;
    protected $fillable = ['name','description','status'];
}
