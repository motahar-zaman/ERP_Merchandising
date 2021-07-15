<?php

namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ThreadBookingDetails extends Model
{
    protected $fillable=['thread_booking_id','thread_code','color','shade_no','count','process','gmnts_qty','consumption','total_meter','cons_meter','total_cons','percentage','booking'];

    public function thread_booking_details()
    {
        return $this->belongsTo(ThreadBooking::class,'thread_booking_id');
    }
}
