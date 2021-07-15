<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    protected $fillable=['company_name','address','phone','email'];
}
