<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%'.$val.'%');

    }
}
