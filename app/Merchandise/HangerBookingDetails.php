<?php
//HAnger Booking Details Model By Nishat

namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class HangerBookingDetails extends Model
{
    protected $fillable=['hanger_booking_id','buyer','style','gmnts_size','hanger_item','item_code','quality','gmnts_qty','percentage','book_qty','remarks'];

    public function hanger_booking_details()
    {
        return $this->belongsTo(HangerBookingDetails::class,'hanger_booking_id');
    }
}
