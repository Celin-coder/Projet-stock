<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'currency',
        'is_active',
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }


    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}