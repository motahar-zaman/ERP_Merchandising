<?php

namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class HangtagBookingDetails extends Model
{
    protected $fillable=['hangtag_booking_id','desc','color','upc','retail_price','size','gmnts_qty','percentage','book_qty','remarks'];

    public function hangtag_booking_details()
    {
        return $this->belongsTo(HangtagBookingDetails::class,'hangtag_booking_id');

    }
}
