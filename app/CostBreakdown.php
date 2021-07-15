<?php

namespace App;

use App\Hrm\Country;
use App\Merchandise\CompanyUnit;
use App\Merchandise\PriceQuotation;
use Illuminate\Database\Eloquent\Model;

class CostBreakdown extends Model
{
    protected $connection = 'mysql';
    protected $fillable = ['unit_id','quote_id','country_id',
        'merchandise_name',
        'consumer_name',
        'product_description',
        'style',
        'front_image',
        'back_image',
        'size_range',
        'specs',
        'estimate_garments',
        'estimate_qty',
        'has_spec',
        'has_sketch',
        'size_ratio',
        'has_size_ratio',
        'cutting_marking',
        'embroidery',
        'embroidery_2',
        'embroidery_3',
        'printing',
        'printing_2',
        'printing_3',
        'washing',
        'washing_2',
        'washing_3',
        'washing_4',
        'washing_5',
        'testing_charge',
        'other_charge',
        'consider',
        'payment_terms'
    ];

    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function PriceQuote()
    {
        return $this->belongsTo(PriceQuotation::class,'quote_id');
    }

    public function fabrics()
    {
        return $this->hasMany(CostBreakDownFabricContent::class);
    }

    public function trims()
    {
        return $this->hasMany(CostBreakDownTrim::class);
    }

    public function other_trims()
    {
        return $this->hasMany(CostBreakDownOtherTrim::class);
    }
}
