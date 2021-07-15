<?php
//LAbel Booking Model By Nishat
namespace App\Merchandise;

use App\BudgetSheet;
use Illuminate\Database\Eloquent\Model;

class LabelBooking extends Model
{
    protected $fillable=['unit_id','to','attn','sub','date','budget_sheet_id','label_style','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function label_booking_details(){
        return $this->hasMany(LabelBookingDetails::class,'label_booking_id');
    }
}
