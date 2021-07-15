<?php
namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

use App\Buyer;
use App\CostBreakdown;
use App\Models\Planning\LineLoading\Item;

class OrderProgressDetails extends Model
{
    protected $connection = 'production';
    protected $table = 'order_progress_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_progress_id',
        'factory_id',
        'production_date',
        'reporting_date',
        'floor',
        'line_no',
        'buyer_id',
        'style_id',
        'color',
        'exit_date',
        'item_id',
        'order_qty',
        'today_cutting',
        'today_sewing_input',
        'today_sewing',
        'sewing_wip',
        'today_send',
        'today_washing_received',
        'washing_wip',
        'today_finishing_received',
        'day_qc_pass',
        'today_pack',
        'bal_pack',
        'daily_ctn',
        'ship_qty',
        'remarks',
    ];

    public function buyer(){
        return $this->hasOne(Buyer::class,'id','buyer_id');
    }
    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
    public function style(){
        return $this->hasOne(CostBreakdown::class,'id','style_id');
    }

    public function order_progress(){
        return $this->belongsTo(OrderProgress::class,'order_progress_id','id');
    }

}


