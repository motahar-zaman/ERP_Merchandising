<?php

namespace App\Models\Planning\Booking;

use Illuminate\Database\Eloquent\Model;
use App\CostBreakdown;
use App\Buyer;

class BookingPlan extends Model
{
	protected $table = 'booking_plan';
	protected $primaryKey = 'id';

	protected $fillable = [
        'lc_factory',
        'buyer_id',
        'style_id',
        'item',
        'merchandiser',
        'merchandiser_head',
        'sketch_or_sample',
        'smv',
        'quantity',
        'order_season',
        'input_date',
        'ex_factory',
        'wash',
        'emblishment',
        'remarks',
    ];

    public function buyer()
    {
        return $this->hasOne(Buyer::class,'id', 'buyer_id');
    }

    public function style()
    {
        return $this->hasOne(CostBreakdown::class,'id', 'style_id');
    }
	
}
