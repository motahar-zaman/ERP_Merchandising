<?php
//Hanger Booking Model By Nishat
namespace App\Models\Planning;

use App\Models\Planning\OrderSummary;
use Illuminate\Database\Eloquent\Model;

class FabricsTNA extends Model
{
    protected $table = 'fabrics_tna';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_summary_style',
        'color_name',
        'shell_booking_date',
        'shell_plan_inhouse_date',
        'shell_actual_inhouse_date',
        'shell_origin_country',
        'shell_app_supplier_name',
        'trims_booking_date',
        'trims_plan_inhouse_date',
        'trims_actual_inhouse_date',
        'trims_origin_country',
        'trims_app_supplier_name',
    ];

    public function summary()
    {
        return $this->hasOne(OrderSummary::class,'id', 'order_summary_style');
    }

}


