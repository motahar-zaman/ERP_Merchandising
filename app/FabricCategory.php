<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FabricCategory extends Model
{
   // use SoftDeletes;
    protected $fillable=['name','description'];


    public function fabrics()
    {
        return $this->hasMany(Fabric::class);
    }
}
