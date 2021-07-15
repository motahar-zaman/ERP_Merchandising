<?php
//Hanger Booking Model By Nishat
namespace App\Merchandise;

use App\BudgetSheet;
use Illuminate\Database\Eloquent\Model;

class HangerBooking extends Model
{
    protected $fillable = ['unit_id','to','attn','sub','date','budget_sheet_id'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style()
    {
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function hanger_booking_details(){
        return $this->hasMany(HangerBookingDetails::class,'hanger_booking_id');
    }
}


