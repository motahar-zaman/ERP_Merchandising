<?php
//Zipper Booking Model By Nishat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ZipperBooking extends Model
{
    protected $fillable =['unit_id','to','attn','sub','date','budget_sheet_id','style_no','zipp_desc','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function zipper_color(){
        return $this->belongsTo(ZipperColor::class);
    }

    public function zipper_booking_details(){
        return $this->hasMany(ZipperBookingDetails::class,'zipper_booking_id');
    }
}
