<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subproduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'detail', 'image', 'price', 'desc'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
