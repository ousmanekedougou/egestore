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
        // $this->middleware(['isMagasin','isAgent']);
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        // dd($request->all());

        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Products');
        }

        $date = null;

        if ($request->date == '') {
            $date = now();
        }else{
            $date = $request->date;
        }

        Bagage::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'date' => $date,
            'image' => $imageName,
            'magasin_id' => AuthMagasinAgent(),
            'commande_id' => $request->reserve_id
        ]);

        $amountToday = $request->price * $request->quantity;
        $commande = Commande::where('id',$request->reserve_id)->first();
        $commande->update(['amount' =>  number_format($commande->amount + $amountToday,2, ',','.')]);

        Toastr::success('Votre bagage a bien été ajouté', 'Ajout de bagages', ["positionClass" => "toast-top-right"]);
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
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $product = Bagage::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();

        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Products');
        }else{
            $imageName = $product->image;
        }

        $date = null;

        if ($request->date == '') {
            $date = $product->date;
        }else{
            $date = $request->date;
        }

        $product->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'date' => $date,
            'image' => $imageName,
            'magasin_id' => AuthMagasinAgent(),
            'commande_id' => $request->reserve_id
        ]);

        Toastr::success('Votre bagages a bien été modifié', 'Modification de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Bagage::where('id',$id)->where('magasin_id',AuthMagasinAgent())->delete();
        Toastr::success('Votre bagage a bien été supprimé', 'Suppression de bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
