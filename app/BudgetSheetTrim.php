<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetSheetTrim extends Model
{
    protected $fillable=['budget_sheet_id','trim_id','distributor','reference','color','trims_description','unit_id','trim_original_qty','trims_booking','trim_order_qty','trims_price','trims_total_price','required_qty','trims_cost'];

    public function trim()
    {
        return $this->belongsTo(Trim::class);
    }
}
