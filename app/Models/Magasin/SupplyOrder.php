<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'slug',
        'bon_commande',
        'magasin_id',
        'supply_id',
        'payment_intent_id ',
        'payment_created_at',
        'products',
        'amount',
        'payment',
        'date',
        'delivery',
        'status',
        'type',
        'methode'
    ];

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }

    public function supply_order_products()
    {
        return $this->hasMany(SupplyOrderProduct::class);
    }
}
