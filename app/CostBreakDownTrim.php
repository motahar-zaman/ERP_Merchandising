<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostBreakDownTrim extends Model
{
    protected $fillable=['cost_breakdown_id','trim_id','distributor','reference','color','trims_description','unit_id','required_qty','trims_price','trims_cost'];

    public function cost_breakdowns()
    {
        return $this->belongsTo(CostBreakdown::class);
    }


    public function trim()
    {
        return $this->belongsTo(Trim::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
