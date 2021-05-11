<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "table_cities";

    public function order()
    {
        return $this->hasMany(OrderDetail::class,'city_id');
    }
}
