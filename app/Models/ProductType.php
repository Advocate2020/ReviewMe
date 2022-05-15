<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%'.$val.'%');

    }
}
