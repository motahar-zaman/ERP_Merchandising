<?php
//Hanger Booking Model By Nishat
namespace App\Models\Planning;

use App\Models\Planning\OrderSummary;
use Illuminate\Database\Eloquent\Model;

class PreProduction extends Model
{
    protected $table = 'pre_production';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_summary_style',
        'color_name',
        'size_ready_date',
        'pp_meeting_date',
        'bulk_cut_date',
        'sewing_start',
        'sewing_finish',
        'washing_date',
        'finishing_packing',
        'final_inspection',
        'ex_factory',
        'actual_size_ready_date',
        'actual_pp_meeting_date',
        'actual_bulk_cut_date',
        'actual_sewing_start',
        'actual_sewing_finish',
        'actual_washing_date',
        'actual_finishing_packing',
        'actual_final_inspection',
        'actual_ex_factory',
        'remarks',
    ];

    public function summary()
    {
        return $this->hasOne(OrderSummary::class,'id', 'order_summary_style');
    }

}


