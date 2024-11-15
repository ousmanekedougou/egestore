<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyOrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'magasin_id',
        'visible',
        'quantity',
        'reference',
        'image',
        'images',
        'price',
        'desc',
        'colors',
        'sizes',
        'supply_order_id',
        'sub_category_id'
    ];

    public function supplyOrder()
    {
        return $this->belongsTo(supplyOrder::class);
    }
}
