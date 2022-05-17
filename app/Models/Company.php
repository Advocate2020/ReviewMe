<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'images/egg-3442-4c317615ec1fd800728672f2c168aca5@1x.jpg';

        return '/storage/' . $imagePath;
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function review()
    {
        return $this->hasMany(CompanyReview::class);
    }
    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%'.$val.'%')
                      ->orWhere('url', 'like', '%'.$val.'%');

    }

}
