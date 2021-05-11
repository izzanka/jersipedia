<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jersey extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'league_id',
       'name',
       'description',
       'price',
       'nameset_price',
       'stock',
       'sold',
       'image',
       'weight'
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }

    
}
