<?php

namespace App\Models\Planning\LineLoading;
use Illuminate\Database\Eloquent\Model;

class Efficiency extends Model
{
    protected $table = 'efficiency';
    protected $primaryKey = 'id';

    protected $fillable = [
        'day',
        'efficiency',
    ];

}


