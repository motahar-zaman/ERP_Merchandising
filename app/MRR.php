<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MRR extends Model
{
   // use SoftDeletes;

    protected $table = 'mrr';
    protected $fillable = [
        'date',
        'buyer_id',
        'item',
        'invoice_no',
        'supplier_id',
        'pkgs',
        'size',
        'unit_id',
        'invoice_qty',
        'received_qty',
        'remarks',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
    
}
