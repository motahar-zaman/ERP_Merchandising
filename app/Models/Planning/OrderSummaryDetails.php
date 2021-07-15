<?php
//Hanger Booking Model By Nishat
namespace App\Models\Planning;

use App\Models\Planning\OrderSummary;
use Illuminate\Database\Eloquent\Model;

class OrderSummaryDetails extends Model
{
    protected $table = 'order_summary_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_summary_id',
        'color_name',
        'fob_price_pcs',
        'cm_price_pcs',
        'quantity_pcs',
        'ship_date',
    ];

    public function summary()
    {
        return $this->hasOne(OrderSummary::class,'id', 'order_summary_id');
    }

}


