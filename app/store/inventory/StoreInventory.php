<?php

namespace App\store\inventory;

use App\Buyer;
use App\CostBreakdown;
use App\store\booking\StoreBooking;
use App\store\order\StoreOrder;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;

class StoreInventory extends Model
{
    protected $fillable=['rcv_date','inv_cha','style_no','order_no','order_qty','buyer','supplier','exp_lc','bb_lc','po_no','accounts','bond_no','floor','packages'];

    public function store_booking()
    {
        return $this->belongsTo(StoreBooking::class,'store_booking_id');
    }

    public function store_inventory_details(){
        return $this->hasMany(StoreInventoryDetails::class,'store_inventory_id');
    }

    public function style_name(){
        return $this->belongsTo(StoreBooking::class,'style_no');
    }

    public function style(){
        return $this->hasOne(StoreOrder::class,'id','style_no');
    }

    public function buyer_name(){
        return $this->belongsTo(Buyer::class,'buyer');
    }

    public function supplier_name(){
        return $this->belongsTo(Supplier::class,'supplier');
    }

    public function store_order()
    {
        return $this->belongsTo(StoreOrder::class,'style_no');
    }
}
