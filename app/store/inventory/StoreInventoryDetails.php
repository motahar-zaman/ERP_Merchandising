<?php

namespace App\store\inventory;

use App\store\booking\StoreBookingDetails;
use Illuminate\Database\Eloquent\Model;

class StoreInventoryDetails extends Model
{
    protected $fillable=['store_inventory_id','store_booking_details_id','item_name','req_qty','invoice_qty','received_qty','short_qty','over_qty','fab_roll','remarks','rcv_date'];

    public function store_inventory()
    {
        return $this->belongsTo(StoreInventory::class,'store_inventory_id');
    }


    public function store_booking_details()
    {
        return $this->belongsTo(StoreBookingDetails::class,'store_booking_details_id');

    }
}
