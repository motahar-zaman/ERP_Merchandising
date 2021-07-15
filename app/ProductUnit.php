<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUnit extends Model
{
    //use SoftDeletes;

    protected $table = "product_units";

    protected $fillable = ['name','description'];

    public function fabric(){
        return $this->hasOne(Fabric::class);
    }

    public function trim()
    {
        return $this->hasOne(Trim::class);
    }
}
