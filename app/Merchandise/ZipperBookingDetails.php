<?php
//Zipper Booking Details By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ZipperBookingDetails extends Model
{
    protected $fillable =['zipper_booking_id','size','tape_color','color_code','length','zipper_color','zipper_details','gmnts_qty','percentage','book_qty','remarks'];

    public function color_id(){
        return $this->belongsTo(ZipperColor::class,'color_id');
    }

    public function zipper_bookings(){
        return $this->belongsTo(ZipperBooking::class,'zipper_booking_id');
    }
}
