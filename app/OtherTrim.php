<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherTrim extends Model
{
    protected $fillable = ['name','other_trim_category_id','product_unit_id','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Trim belongs to trims category
     */
    public function other_trim_category(){
        return $this->belongsTo(OtherTrimCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Trim belongs to Product Unit
     */
    public function product_unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
