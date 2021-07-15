<?php

//Fabric Booking Model By Nishat
namespace App\Merchandise;

use App\Merchandise\FabricBookingDetails;
use Illuminate\Database\Eloquent\Model;

class FabricBooking extends Model
{
    protected $fillable = ['unit_id','to','attn','sub','date','budget_sheet_id','Supplier_name','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function color_id(){
        return $this->belongsTo(ZipperColor::class,'color_id');
    }

    public function fabric_booking_details()
    {
        return $this->hasMany(FabricBookingDetails::class,'fabric_bookings_id');

    }



}
