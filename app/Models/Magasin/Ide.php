<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ide extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'sujet',
        'msg',
        'type',
        'magasin_id'
    ];
}
