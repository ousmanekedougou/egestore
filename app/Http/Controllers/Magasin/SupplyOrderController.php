<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Commande;
use App\Models\Magasin\Supply;
use App\Models\Magasin\SupplyOrder;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SupplyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bon_commande' => 'required|string',
            'deivery_date' => 'require|date',
        ]);

        $verify = SupplyOrder::where("magasin_id", AuthMagasinAgent())->where('supply_id',$request->supply_id)->latest()->where('request',1)->first();
        if ($verify) {
            $newOrder = $verify->order + 1;
        }else {
            $newOrder = 1;
        }

        $verifyBonCommande = SupplyOrder::where("magasin_id", AuthMagasinAgent())->where('supply_id',$request->supply_id)->where('bon_commande',$request->bon_commande)->where('request',1)->first();
        if ($verifyBonCommande) {
            Toastr::error('Ce bon de commande existe pour ce magasin', 'Error du bon de commande', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
             SupplyOrder::create([
                'order' => $newOrder,
                'bon_commande' => $request->bon_commande,
                'slug' => str_replace('/','',Hash::make(Str::random(2).$newOrder)),
                'date' => $request->delivery_date,
                'supply_id' => $request->supply_id,
                'magasin_id' => AuthMagasinAgent(),
                'status' => 2,
                'request' => 1
            ]);
            Toastr::success('Votre commande de devis a bien été ajouté', 'Ajout de commande devis', ["positionClass" => "toast-top-right"]);
            return back();
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        
        return view('magasin.supplies.buyer_order',
        [
            'supplie' => Supply::where('owner_id',AuthMagasinAgent())->where('slug',$slug)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SupplyOrder::where('id',$id)->where('supply_id',request()->supply_id)->where('magasin_id',AuthMagasinAgent())->where('request',1)->delete();
        Toastr::success('Votre commande de devis a bien été supprimé', 'Suppression de commandes', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
