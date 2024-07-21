<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Magasin\Product;
use App\Models\Magasin\SubCategory;

class ProduitController extends Controller
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
        return view('magasin.produits.index',['products' => Product::where('magasin_id',AuthMagasinAgent())->get()]);
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
        $files = $request->file('attachment');

        // dd($files);

        if($request->hasFile('attachment'))
        {
            dd($files);
            // foreach ($files as $file) {
            //     $file->store('users/' . $this->user->id . '/messages');
            // }
        }
        
        $this->validate($request,[
            'name' => 'required|string|unique:products',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp', 
            'desc' => 'required|string',
            'visible' => 'required|boolean',
        ]);

        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Products');
        }

        Product::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'desc' => $request->desc,
            'image' => $imageName,
            'visible' => $request->visible,
            'magasin_id' => AuthMagasinAgent(),
            'sub_category_id' => $request->sub_category_id
        ]);

        notify()->success('Votre produit a ete ajouter avec success ⚡️', 'Ajout produit');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('magasin.produits.index',['subcategory' => SubCategory::where('slug',$slug)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('magasin.produits.show',['product' => Product::where('slug',$slug)->where('magasin_id',AuthMagasinAgent())->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $product = Product::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();

        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Products');
        }else{
            $imageName = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'desc' => $request->desc,
            'image' => $imageName,
            'visible' => $request->visible,
            'magasin_id' => AuthMagasinAgent(),
            'sub_category_id' => $request->sub_category_id
        ]);

        notify()->success('Votre produit a ete modifier avec success ⚡️', 'Modification produit');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Product::where('id',$id)->where('magasin_id',AuthMagasinAgent())->delete();
        notify()->success('Votre categorie a ete supprimer avec success  ⚡️', 'Suppression categorie');
        return back();
    }
}
