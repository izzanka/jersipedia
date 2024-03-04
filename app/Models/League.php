<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_slug',
        'country',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
