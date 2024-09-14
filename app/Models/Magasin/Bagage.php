<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity',
        'amount',
        'reference',
        'image',
        'type',
        'date',
        'commande_id',
        'magasin_id',
    ];

    public function getPrice(){
        return number_format($this->price,2, ',','.'). ' CFA';
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
