<?php
//Button Booking Model By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ButtonBooking extends Model
{
    protected $fillable =['unit_id','to','attn','sub','date','budget_sheet_id','button_size','button_desc','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function button_booking_details(){
        return $this->hasMany(ButtonBookingDetails::class,'button_booking_id');
    }
}
