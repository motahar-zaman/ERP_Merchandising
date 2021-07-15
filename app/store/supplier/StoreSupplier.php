<?php

namespace App\store\supplier;

use Illuminate\Database\Eloquent\Model;

class StoreSupplier extends Model
{
    protected $fillable =['supplier_id','supplier_name','supplier_address','supplier_phone','supplier_mobile','supplier_fax','supplier_email'];
}
