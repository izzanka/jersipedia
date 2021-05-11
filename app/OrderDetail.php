<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'total_price',
        'total_order',
        'total_weight',
        'nameset',
        'name',
        'number',
        'order_id',
        'jersey_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function jersey()
    {
        return $this->belongsTo(Jersey::class);
    }
}
