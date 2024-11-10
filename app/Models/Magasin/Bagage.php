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
        'type',
        'date',
        'commande_id',
        'magasin_id',
    ];

    public function getPrice(){
        return number_format($this->price,2, ',','.'). ' cfa';
    }

    public function getTotalPrice(){
        return number_format($this->price * $this->quantity,2, ',','.'). ' cfa';
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
