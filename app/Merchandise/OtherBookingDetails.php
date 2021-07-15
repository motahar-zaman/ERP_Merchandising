<?php
//Other Booking Details By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class OtherBookingDetails extends Model
{
    protected $fillable =['other_booking_id','item','item_desc','size','color','color_code','length','other_color','other_details','gmnts_qty','percentage','book_qty','remarks'];

    public function color_id(){
        return $this->belongsTo(OtherColor::class,'color_id');
    }

    public function other_bookings(){
        return $this->belongsTo(OtherBooking::class,'other_booking_id');
    }
}
