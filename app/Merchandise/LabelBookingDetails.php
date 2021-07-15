<?php

namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class LabelBookingDetails extends Model
{
    protected $fillable =['label_booking_id','desc','care_instruction','color','upc','retail_price','size','gmnts_qty','percentage','book_qty','remarks'];

    public function label_booking_details()
    {
        return $this->belongsTo(HangtagBookingDetails::class,'label_booking_id');

    }
}
