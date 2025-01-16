<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Product;
use App\Models\Magasin\Supply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('magasin.supplies.index',[
            'magasins' => Magasin::where('is_active',1)->where('confirmation_token',null)->where('id','!=',AuthMagasinAgent())->get()
        ]);
    }

    public function addSupply($id){
        $magasin = Magasin::where('is_active',1)->where('confirmation_token',null)->where('id',$id)->first();
        $supplyExist = Supply::where('owner_id',AuthMagasinAgent())->where('magasin_id',$magasin->id)->first();
        if ($supplyExist) {
            Toastr()->error('Ce magasin est deja ajoute comme fournisseur', 'Ce magasin existe', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Supply::create([
                'owner_id' => AuthMagasinAgent(),
                'magasin_id' => $magasin->id,
                'slug' => str_replace('/','',Hash::make(Str::random(2).$magasin->name)),
                'logo' => $magasin->logo
            ]);
            Toastr()->success('Ce magasin a ete ajouter comme fourniseur', 'Ajout fournisseur', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('magasin.supplies.supplie',[
            'supplies' => Supply::where('owner_id',AuthMagasinAgent())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // dd(request()->slug);
        return view('magasin.supplies.show',
            [
                'magasin' => Magasin::where('slug',request()->slug)->where('is_active',1)->where('confirmation_token',null)->where('id','!=',AuthMagasinAgent())->first()
            ]
        );
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
        $supplyGet = Supply::where('id',$id)->where('owner_id',AuthMagasinAgent())->first();
        Product::where('supply_id',$supplyGet->id)->where('magasin_id',AuthMagasinAgent())->update(['supply_id' => null,'supply_name' => $supplyGet->name]);
        $supplyGet->delete();
        Toastr()->success('Fournisseur retirer avec success', 'Suppression fournisseur', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
