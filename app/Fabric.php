<?php
//Fabric Model By Nishat
namespace App;

use App\Merchandise\FabricBookingDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabric extends Model
{
   // use SoftDeletes;

    protected $fillable = ['name','fabric_category_id','product_unit_id','description'];

    public function fabric_category()
    {
        return $this->belongsTo(FabricCategory::class);
    }

    public function product_unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }

    public function fabric_booking_details()
    {
        return $this->hasMany(FabricBookingDetails::class,'fabric_bookings_id');

    }
}
