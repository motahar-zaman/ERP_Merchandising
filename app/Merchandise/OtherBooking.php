<?php
//Other Booking Model By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class OtherBooking extends Model
{
    protected $fillable =['unit_id','to','attn','sub','date','budget_sheet_id','item','other_desc','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function other_booking_details(){
        return $this->hasMany(OtherBookingDetails::class,'other_booking_id');
    }
}
