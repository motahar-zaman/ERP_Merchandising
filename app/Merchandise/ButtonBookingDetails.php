<?php
//Button Booking Details By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ButtonBookingDetails extends Model
{
    protected $fillable =['button_booking_id','size','color','color_code','length','button_color','button_details','gmnts_qty','percentage','book_qty','remarks'];

    public function color_id(){
        return $this->belongsTo(ButtonColor::class,'color_id');
    }

    public function button_bookings(){
        return $this->belongsTo(ButtonBooking::class,'button_booking_id');
    }
}
