<?php

namespace App\store\booking;

use App\Buyer;
use App\CostBreakdown;
use App\Merchandise\CompanyUnit;
use App\store\inventory\StoreInventory;
use App\store\merchandiser\StoreMerchandiser;
use App\store\order\StoreOrder;
use App\store\StoreGroup;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;

class StoreBooking extends Model
{
    protected $fillable=['store_order_id','booking_date','style_no','order_no','order_qty','buyer_name','merchandiser_name'];

    public function store_inventory(){
        return $this->hasOne(StoreInventory::class,'store_booking_id');
    }

    public function store_booking_details(){
        return $this->hasMany(StoreBookingDetails::class,'store_booking_id');
    }

    public function cost_breakdowns()
    {
        return $this->belongsTo(CostBreakdown::class);
    }

    public function style_name()
    {
        return $this->belongsTo(StoreOrder::class,'style_no');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class,'buyer_name');
    }

    public function merchandiser()
    {
        return $this->belongsTo(StoreMerchandiser::class,'merchandiser_name');
    }

    public  function units()
    {
        return $this->belongsTo(CompanyUnit::class,'unit');
    }

    public  function groups()
    {
        return $this->hasMany(StoreGroup::class,'group');
    }

    public  function suppliers()
    {
        return $this->hasMany(Supplier::class,'supplier_name');
    }

    public function store_order()
    {
        return $this->belongsTo(StoreOrder::class,'store_order_id');
    }
}
