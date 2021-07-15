<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetSheetOtherTrim extends Model
{
    protected $fillable=['budget_sheet_id','provider','other_trim_id','other_trim_description','other_trims_booking','other_trim_order_qty','qty','price','cost'];

    public function otherTrim()
    {
        return $this->belongsTo(OtherTrim::class);
    }
}
