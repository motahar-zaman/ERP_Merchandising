<?php

namespace App\store\booking;

use App\Merchandise\CompanyUnit;
use App\ProductUnit;
use App\store\inventory\StoreInventoryDetails;
use App\store\requisition\StoreRequisitionDetails;
use App\store\StoreGroup;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;

class StoreBookingDetails extends Model
{
    protected $fillable=['store_booking_id','style_no','group','item','order_qty','unit','supplier_name','rcv_qty','balance_qty','qoh','fabric_roll','remarks'];

    public function store_inventory_details()
    {
        return $this->hasMany(StoreInventoryDetails::class,'store_booking_details_id');

    }

    public function store_requisition_details()
    {
        return $this->hasMany(StoreRequisitionDetails::class,'store_booking_details_id');

    }

    public function store_bookings()
    {
        return $this->belongsTo(StoreBooking::class,'store_booking_id');

    }

    public  function unit_name()
    {
        return $this->belongsTo(ProductUnit::class,'unit');
    }

    public  function groups()
    {
        return $this->belongsTo(StoreGroup::class,'group');
    }

    public  function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_name');
    }
}
