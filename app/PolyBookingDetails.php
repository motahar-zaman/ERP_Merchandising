<?php

namespace App;

use App\Merchandise\PolyBooking;
use Illuminate\Database\Eloquent\Model;

class PolyBookingDetails extends Model
{
    protected $fillable =['poly_bookings_id','style','gmts_size','ord_type','length','width','adhesive',
        'hang_cut','air_hole','type_of_poly','gmnts_qty','pcs_per_poly','req_qty','percentage','book_qty','remarks'];

    public function poly_bookings()
    {
        return $this->belongsTo(PolyBooking::class,'poly_bookings_id');

    }
}
