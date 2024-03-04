<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'league_id',
        'name',
        'name_slug',
        'description',
        'price',
        'stock',
        'sold',
        'image',
        'weight',
        'avg_review_ratings',
        'total_reviews',
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
