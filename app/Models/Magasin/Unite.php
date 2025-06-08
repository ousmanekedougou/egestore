<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;

    protected $fillables = [
        'name',
        'status',
        'magasin_id'
    ];

      public function magasin()
    {
        return $this->belongsTo(Magasin::class);
    }
}
