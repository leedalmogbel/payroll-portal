<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'image',
        'category',
        'price',
        'desc'
    ];

    public function subproducts()
    {
        return $this->hasMany(Subproduct::class);
    }
}
