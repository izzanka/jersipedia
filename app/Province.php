<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table="table_provinces";

    public function order()
    {
        return $this->hasMany(OrderDetail::class,'province_id');
    }

}
