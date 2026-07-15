<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'category_id',
        'supplier_id',
        'name',
        'sku',
        'barcode',
        'purchase_price',
        'selling_price',
        'minimum_stock',
        'unit',
        'description',
        'is_active',
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }


    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }


    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}