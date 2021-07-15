<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostBreakDownOtherTrim extends Model
{
    protected $table ="cost_break_down_other_trims";
    protected $fillable=['cost_breakdown_id','provider','other_trim_id','other_trim_description','qty','price','cost'];

    public function cost_breakdowns()
    {
        return $this->belongsTo(CostBreakdown::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function otherTrim()
    {
        return $this->belongsTo(OtherTrim::class);
    }
}
