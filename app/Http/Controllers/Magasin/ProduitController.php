<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Magasin\Product;
use App\Models\Magasin\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
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

        $data = [];
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $imageStore = $image->store('Products/ImageSimilaires');
                $data[] = $imageStore;
            }
        }

        $sizes = [];
        if ($request->sizes) {
            foreach ($request->sizes as $size) {
                $sizes['name'][] = $size;
            }
        }

        $colors = null;
        $sizes = null;

        if ($request->colors != '') {
            $colors = $request->colors;
        }else {
            $colors = null;
        }

        if ($request->sizes != '') {
            $sizes = $request->sizes;
        }else {
            $sizes = null;
        }

        Product::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'stock' => $request->quantity,
            'desc' => $request->desc,
            'image' => $imageName,
            'images' => json_encode($data),
            'visible' => $request->visible,
            'colors' => serialize($colors),
            'sizes' => serialize($sizes),
            'magasin_id' => AuthMagasinAgent(),
            'sub_category_id' => $request->sub_category_id
        ]);
        Toastr::success('Votre produit a bien été ajouté', 'Ajout de produits', ["positionClass" => "toast-top-right"]);
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

        $data = [];
        $imagesUpdate = '';
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $imageStore = $image->store('Products/ImageSimilaires');
                $data[] = $imageStore;
            }
            $imagesUpdate = json_encode($data);
        }else {
            $imagesUpdate = $product->images;
        }

        $colors = null;
        $sizes = null;

        if ($request->colors != '') {
            $colors = serialize($request->colors);
        }else {
            $colors = $product->colors;
        }

        if ($request->sizes != '') {
            $sizes = serialize($request->sizes);
        }else {
            $sizes = $product->sizes;
        }

        $product->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'stock' => $request->quantity,
            'desc' => $request->desc,
            'image' => $imageName,
            'images' => $imagesUpdate,
            'visible' => $request->visible,
            'colors' => $colors,
            'sizes' => $sizes,
            'magasin_id' => AuthMagasinAgent(),
            'sub_category_id' => $request->sub_category_id
        ]);

        Toastr::success('Votre produit a bien été modifié', 'Modification de produits', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Product::where('id',$id)->where('magasin_id',AuthMagasinAgent())->delete();
        Toastr::success('Votre produit a bien été supprimé', 'Supression de produits', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
