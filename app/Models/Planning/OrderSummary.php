<?php
//Hanger Booking Model By Nishat
namespace App\Models\Planning;

// use App\Models\Planning\OrderSummaryDetails;
// use App\Models\Planning\SampleTNA;
// use App\Models\Planning\FabricsTNA;
// use App\Models\Planning\AllAccTNA;
// use App\Models\Planning\PreProduction;
use App\Merchandise\CompanyUnit;
use App\Merchandise\PriceQuotation;
use App\Buyer;
use App\CostBreakdown;

use Illuminate\Database\Eloquent\Model;

class OrderSummary extends Model
{
    protected $table = 'order_summary';
    protected $primaryKey = 'id';

    protected $fillable = [
        'input_date',
        'merchant_team',
        'unit_id',
        'buyer_id',
        'payment_term',
        'front_image',
        'back_image',
        'item',
        'style_id',
        'spec_group',
        'size_range',
        'confirmation_date',
        'po_issue_date',
        'lc_contract_rcv_date',
    ];

    public function details()
    {
        return $this->hasMany(OrderSummaryDetails::class,'order_summary_id', 'id');
    }

    public function unit()
    {
        return $this->hasOne(CompanyUnit::class,'id', 'unit_id');
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class,'id', 'buyer_id');
    }
    public function payment()
    {
        return $this->hasOne(PriceQuotation::class,'id', 'payment_term');
    }
    public function style()
    {
        return $this->hasOne(CostBreakdown::class,'id', 'style_id');
    }


    public function sample_tna()
    {
        return $this->hasMany(SampleTNA::class,'order_summary_style', 'id');
    }
    public function fabrics_tna()
    {
        return $this->hasMany(FabricsTNA::class,'order_summary_style', 'id');
    }
    public function all_acc_tna()
    {
        return $this->hasMany(AllAccTNA::class,'order_summary_style', 'id');
    }
    public function pre_production()
    {
        return $this->hasMany(PreProduction::class,'order_summary_style', 'id');
    }

}


