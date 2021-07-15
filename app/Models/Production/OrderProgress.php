<?php
namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class OrderProgress extends Model
{
    protected $connection = 'production';
    protected $table = 'order_progress';
    protected $primaryKey = 'id';

    protected $fillable = [
        'factory_id',
        'production_date',
        'reporting_date',
    ];

    public function details(){
    	return $this->hasMany(OrderProgressDetails::class,'order_progress_id','id');
    }

}


