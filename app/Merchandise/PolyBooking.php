<?php
//Poly Booking Model By Nishat
namespace App\Merchandise;

use App\BudgetSheet;
use App\PolyBookingDetails;
use Illuminate\Database\Eloquent\Model;

class PolyBooking extends Model
{
    protected $fillable=['unit_id','to','attn','sub','date','req_del_date','budget_sheet_id','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function poly_booking_details()
    {
        return $this->hasMany(PolyBookingDetails::class,'poly_bookings_id');

    }
}
