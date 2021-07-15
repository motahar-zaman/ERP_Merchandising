<?php
namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

use App\Buyer;
use App\CostBreakdown;
use App\Models\Planning\LineLoading\Item;

class ForecastDetails extends Model
{
    protected $connection = 'production';
    protected $table = 'forecast_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'forecast_id',
        'factory_id',
        'reporting_date',
        'production_date',
        'target_date',
        'floor',
        'line_no',
        'buyer_id',
        'item_id',
        'style_id',
        'smv',
        'op_present',
        'hp_present',
        'total_mp',
        'running_mc',
        'prod_days',
        'qty',
        'alloc_qty',
        'npt_details',
        'reason_for_less_production',
        'style_cm',
        'plan_cm',
        'cm_erned',
        'cm_short',
        'target',
        'target_hours',
        'output',
        'hours',
        'wash_send',
        'input_target',
        'today_input',
        'new_style_input',
        'dhu',
        'total_npt_min',
        'remarks',
    ];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function style(){
        return $this->belongsTo(CostBreakdown::class);
    }

    public function forecast(){
        return $this->belongsTo(Forecast::class,'forecast_id','id');
    }

}


