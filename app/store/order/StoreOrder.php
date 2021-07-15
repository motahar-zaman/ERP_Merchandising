<?php

namespace App\store\order;

use App\Buyer;
use App\store\merchandiser\StoreMerchandiser;
use Illuminate\Database\Eloquent\Model;

class StoreOrder extends Model
{
    protected $fillable= ['order_no','style_no','order_date','shipment_date','size_range','unit_price','order_qty','order_value','price_curr','remarks','buyer','merchandiser','item_desc','shell_fabric','master_lc_no','master_lc_date','wash_type','embroidery','printing'];

    public function buyers()
    {
        return $this->belongsTo(Buyer::class,'buyer');
    }

    public function merchandisers()
    {
        return $this->belongsTo(StoreMerchandiser::class,'merchandiser');
    }
}
