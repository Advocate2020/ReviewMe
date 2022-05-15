<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%'.$val.'%');

    }
}
