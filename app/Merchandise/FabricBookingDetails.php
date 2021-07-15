<?php

namespace App\Merchandise;

use App\Merchandise\FabricBooking;
use App\Merchandise\ZipperColor;
use Illuminate\Database\Eloquent\Model;

class FabricBookingDetails extends Model
{
    protected $fillable =['fabric_bookings_id','fabric_name','color','gmnts_qty','consumption','req_qty','percentage','book_qty','remarks'];

    public function fabric_bookings()
    {
        return $this->belongsTo(FabricBooking::class,'fabric_bookings_id');

    }
}
