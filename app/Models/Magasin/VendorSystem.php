<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorSystem extends Model
{
    use HasFactory;

      protected $fillables = [
        'quantity',
        'price_achat',
        'price_vente',
        'price_revenu',
        'magasin_id',
        'product_id'
    ];

    public function magasin()
    {
        return $this->belongsTo(Magasin::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
