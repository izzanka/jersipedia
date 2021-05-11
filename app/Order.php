<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'status',
        'total_price',
        'total_weight',
        'user_id',
        'phone',
        'address',
        'province_id',
        'city_id',
        'courier',
        'service',
        'cost',
        'estimation'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

}
