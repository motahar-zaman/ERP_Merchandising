<?php

//Thread Booking Model By NIshat
namespace App\Merchandise;

use Illuminate\Database\Eloquent\Model;

class ThreadBooking extends Model
{
    protected $fillable=['unit_id','to','attn','sub','style_no','book_date','budget_sheet_id','buyer_name'];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function budget_sheet_style(){
        return $this->belongsTo(BudgetSheet::class,'budget_sheet_id');
    }

    public function thread_booking_details(){
        return $this->hasMany(ThreadBookingDetails::class,'thread_booking_id');
    }
}
