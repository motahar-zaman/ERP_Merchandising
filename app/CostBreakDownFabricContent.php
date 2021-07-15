<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostBreakDownFabricContent extends Model
{
    protected $fillable=['cost_breakdown_id','unit_id','fabric_width','fabric_weight','fabric_content','fabric_description','fabric_id','supplier_id','fabric_consumption','unit_price','fabric_cost'];

    public function cost_breakdowns()
    {
        return $this->belongsTo(CostBreakdown::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unit()
    {
        return $this->belongsTo(ProductUnit::class,'unit_id');
    }
}
