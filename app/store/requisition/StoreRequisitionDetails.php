<?php

namespace App\store\requisition;

use App\store\booking\StoreBookingDetails;
use Illuminate\Database\Eloquent\Model;

class StoreRequisitionDetails extends Model
{
    protected $fillable =['store_requisition_id','store_booking_details_id','consumption','issued','roll','remarks_details','issue_date'];

    public function store_requisition()
    {
        return $this->belongsTo(StoreRequisition::class,'store_requisition_id');
    }

    public function store_booking_details()
    {
        return $this->belongsTo(StoreBookingDetails::class,'store_booking_details_id');
    }
}
