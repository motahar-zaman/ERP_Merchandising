<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;

class OrderElement extends Model
{
    protected $table = 'order_elements';
    protected $primaryKey = 'id';
}
