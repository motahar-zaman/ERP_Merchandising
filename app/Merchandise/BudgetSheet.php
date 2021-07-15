<?php

namespace App\Merchandise;

use App\Hrm\Country;
use App\Merchandise\CompanyUnit;
use App\Merchandise\PriceQuotation;
use Illuminate\Database\Eloquent\Model;

class BudgetSheet extends Model
{
    protected $table = 'budget_sheets';
    protected $fillable = [
        'country_id',
        'cost_sheet_id',
        'unit_id',
        'quote_id',
        'payment_terms',
        'merchandise_name',
        'consumer_name',
        'product_description',
        'style',
        'size_range',
        'specs',
        'front_image',
        'back_image',
        'estimate_garments',
        'fob',
        'consumption',
        'pocket_fab_yy',
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
        'consider'
    ];
    public function CompanyUnit()
    {
        return $this->belongsTo(CompanyUnit::class,'unit_id');
    }

    public function country()
    {
        return $this->belongsTo(\App\Hrm\Country::class);
    }

    public function PriceQuote()
    {
        return $this->belongsTo(PriceQuotation::class,'quote_id');
    }

    public function fabrics()
    {
        return $this->hasMany(\App\BudgetSheetFabricContent::class);
    }

    public function trims()
    {
        return $this->hasMany(\App\BudgetSheetTrim::class);
    }

    public function other_trims()
    {
        return $this->hasMany(\App\BudgetSheetOtherTrim::class);
    }
}
