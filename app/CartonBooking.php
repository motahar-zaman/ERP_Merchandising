<?php

namespace App;

use App\Merchandise\CompanyUnit;
use Illuminate\Database\Eloquent\Model;

class CartonBooking extends Model
{
    protected $fillable =['unit_id','to','attn','sub','date','req_del_date','budget_sheet_id','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function carton_booking_details()
    {
        return $this->hasMany(CartonBookingDetails::class,'carton_bookings_id');

    }
}
