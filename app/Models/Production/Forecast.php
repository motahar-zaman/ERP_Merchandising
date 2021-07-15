<?php
namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $connection = 'production';
    protected $table = 'forecasts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'factory_id',
        'reporting_date',
        'production_date',
        'target_date',
        'user_id'
    ];

    public function details(){
    	return $this->hasMany(ForecastDetails::class,'forecast_id','id');
    }

}


