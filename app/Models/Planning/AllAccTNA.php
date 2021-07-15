<?php
//Hanger Booking Model By Nishat
namespace App\Models\Planning;

use App\Models\Planning\OrderSummary;
use Illuminate\Database\Eloquent\Model;

class AllAccTNA extends Model
{
    protected $table = 'all_acc_tna';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_summary_style',
        'item_name',
        'booking_date',
        'inhouse_date',
        'actual_inhouse_date',
        'org_country',
        'supplier_name',
    ];

    public function summary()
    {
        return $this->hasOne(OrderSummary::class,'id', 'order_summary_style');
    }

}


