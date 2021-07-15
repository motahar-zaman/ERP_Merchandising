<?php

namespace App\Models\Planning\LineLoading;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $connection = 'mysql';
    protected $table = 'items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'peak_efficiency',
    ];

}


