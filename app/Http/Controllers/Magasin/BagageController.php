<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Bagage;
use App\Models\Magasin\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Magasin\Product;
use App\Models\Magasin\SubCategory;
use Brian2694\Toastr\Facades\Toastr;

class BagageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isMagasin','isAgent']);
    }

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

    public function post(Request $request){
        $this->validate($request,[
            'inputs' => 'required',
        ]);

        // dd($request->inputs);

        foreach ($request->inputs as $input) 
        {
            Bagage::create([
                'name' => $input['name'],
                'slug' => str_replace('/','',Hash::make(Str::random(2).$input['name'])),
                'reference' => $input['reference'],
                'price' => $input['price'],
                'quantity' => $input['qty'],
                'type' => $request->type,
                'amount' => $input['price'] * $input['qty'],
                'date' => now(),
                'magasin_id' => AuthMagasinAgent(),
                'commande_id' => $request->reserve_id
            ]);
        }

        $amountBagageTotal = Bagage::where('commande_id',$request->reserve_id)->where('magasin_id',AuthMagasinAgent())->sum('amount');
        // dd($commande);
        Commande::where('id',$request->reserve_id)
            ->where('magasin_id',AuthMagasinAgent())
            ->where('type',1)->update(['amount' => $amountBagageTotal ]);

        Toastr()->success('Votre bagage a bien été ajouté', 'Ajout de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'inputs' => 'required',
        ]);
        foreach ($request->inputs as $input) 
        {
            Bagage::create([
                'name' => $input['name'],
                'slug' => str_replace('/','',Hash::make(Str::random(2).$input['name'])),
                'reference' => $input['reference'],
                'price' => $input['price'],
                'quantity' => $input['qty'],
                'type' => $request->type,
                'amount' => $input['price'] * $input['qty'],
                'date' => now(),
                'magasin_id' => AuthMagasinAgent(),
                'commande_id' => $request->reserve_id
            ]);
        }

        // dd($request->price * $request->quantity);

        $amountBagageTotal = Bagage::where('commande_id',$request->reserve_id)->where('type',$request->type)->where('magasin_id',AuthMagasinAgent())->sum('amount');
        // dd($amountBagageTotal);
        Commande::where('id',$request->reserve_id)
            ->where('magasin_id',AuthMagasinAgent())
            ->where('type',0)->update(['amount' => $amountBagageTotal ]);

        Toastr()->success('Votre bagage a bien été ajouté', 'Ajout de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // return view('magasin.produits.index',['subcategory' => SubCategory::where('slug',$slug)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        // return view('magasin.produits.show',['product' => Bagage::where('slug',$slug)->where('magasin_id',AuthMagasinAgent())->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Bagage::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();


        $product->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'amount' => $request->price * $request->quantity,
            'type' => $request->type,
            'magasin_id' => AuthMagasinAgent(),
            'commande_id' => $request->reserve_id
        ]);

        $amountBagageTotal = Bagage::where('commande_id',$request->reserve_id)->where('magasin_id',AuthMagasinAgent())->sum('amount');

        $product->commande->update(['amount' => $amountBagageTotal ]);

        Toastr()->success('Votre bagages a bien été modifié', 'Modification de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bagage = Bagage::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();

        $bagage->commande->update(['amount' => $bagage->commande->amount - $bagage->amount ]);
        
        $bagage->delete();
        Toastr()->success('Votre bagage a bien été supprimé', 'Suppression de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
