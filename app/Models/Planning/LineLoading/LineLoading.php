<?php

namespace App\Models\Planning\LineLoading;
use Illuminate\Database\Eloquent\Model;


use App\Models\Planning\LineLoading\Item;
use App\Merchandise\CompanyUnit;
use App\CostBreakdown;
use App\Buyer;

class LineLoading extends Model
{
    protected $table = 'line_loading_plan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'factory_id',
        'floor',
        'line_no',
        'buyer_id',
        'style_id',
        'item_id',
        'quantity',
        'with_percent',
        'allot_qty',
        'mc_use',
        'manpower',
        'smv',
        'avg_prod',
        'days_total',
        'eff_avg',
        'avl_min_1',
        'avl_min_2',
        'date',
        'date_with_efficiency',
    ];

    public function factory()
    {
        return $this->hasOne(CompanyUnit::class,'id', 'factory_id');
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class,'id', 'buyer_id');
    }
    public function style()
    {
        return $this->hasOne(CostBreakdown::class,'id', 'style_id');
    }
    public function item()
    {
        return $this->hasOne(Item::class,'id', 'item_id');
    }

}


