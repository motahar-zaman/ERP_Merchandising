<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartonBookingDetails extends Model
{
    protected $fillable=['carton_bookings_id','style','gmts_size','ord_type','length','width','height','type_of_carton','gmnts_qty','pcs_per_carton','req_qty','percentage','book_qty','remarks'];

    public function carton_bookings()
    {
        return $this->belongsTo(CartonBooking::class,'carton_bookings_id');

    }
}
