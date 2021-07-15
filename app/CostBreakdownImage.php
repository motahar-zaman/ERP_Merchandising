<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostBreakdownImage extends Model
{
    protected $fillable =['cost_breakdown_id','image'];

    public function images(){
        return $this->belongsTo(CostBreakdown::class,'cost_breakdown_id');
    }
}
