<?php

namespace App\store\requisition;

use App\Buyer;
use App\CostBreakdown;
use App\Merchandise\CompanyUnit;
use App\store\order\StoreOrder;
use Illuminate\Database\Eloquent\Model;

class StoreRequisition extends Model
{
    protected $fillable=['date','style','ord_no','ord_qty','buyer','company_unit','remarks'];

    public function store_requisition_details(){
        return $this->hasMany(StoreRequisitionDetails::class,'store_requisition_id');
    }

    public function style_name(){
        return $this->belongsTo(StoreOrder::class,'style');
    }

    public function buyer_name(){
        return $this->belongsTo(Buyer::class,'buyer');
    }

    public function company_name(){
        return $this->belongsTo(CompanyUnit::class,'company_unit');
    }
    
    public function store_order()
    {
        return $this->belongsTo(StoreOrder::class,'style');
    }
}
