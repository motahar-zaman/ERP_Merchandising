<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessories extends Model
{
    //use SoftDeletes;
    protected $fillable = ['name','accessories_category_id','product_unit_id','description'];

    public function accessories_category(){
        return $this->belongsTo(AccessoriesCategory::class);
    }

    public function product_unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
