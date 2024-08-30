<?php

namespace App\Models\Magasin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'slug',
        'amount',
        'credit',
        'account',
        'magasin_id',
    ];

    public function getAmount(){
        return number_format($this->amount,2, ',','.'). ' CFA';
    }

    public function getCredit(){
        return number_format($this->credit,2, ',','.'). ' CFA';
    }

    public function magasin()
    {
        return $this->belongsTo(Magasin::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function getOrderCount($id){
        return Order::where('client_id',$id)->where('magasin_id',AuthMagasinAgent())->orderBy('id','DESC')->count();
    }
}
