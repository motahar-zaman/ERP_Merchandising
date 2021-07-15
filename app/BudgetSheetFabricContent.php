<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetSheetFabricContent extends Model
{
    protected $fillable=['budget_sheet_id','fabric_content','fabric_description','fabric_id','original_qty','fab_booking','order_qty','price','total_price','supplier_id','fabric_consumption','unit_id','unit_price','fabric_cost'];

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
    public function unit()
    {
        return $this->belongsTo(ProductUnit::class,'unit_id');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
}
