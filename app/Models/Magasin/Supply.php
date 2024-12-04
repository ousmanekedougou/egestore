<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'logo',
        'adresse',
        'registre_com',
        'ninea',
        'status',
        'owner_id',
        'magasin_id'
    ];

    public function magasin()
    {
        return $this->belongsTo(Magasin::class);
    }

    public function suply_orders()
    {
        return $this->hasMany(SupplyOrder::class);
    }
}
