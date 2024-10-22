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
        // $colors = explode(",",$request->colors);
        // dd($colors);
        
        $this->validate($request,[
            'name' => 'required|string|unique:products',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'qty_alert' => 'required|numeric',
            'exp_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp', 
            'desc' => 'required|string',
            'visible' => 'required|boolean',
            'promot' => 'boolean',
        ]);

        
        


        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Products');
        }

        // $data = [];
        // if ($request->hasFile('images')) {
        //     foreach ($request->images as $image) {
        //         $imageStore = $image->store('Products/ImageSimilaires');
        //         $data[] = $imageStore;
        //     }
        // }

        // $sizes = [];
        // if ($request->sizes) {
        //     foreach ($request->sizes as $size) {
        //         $sizes['name'][] = $size;
        //     }
        // }

        $colors = null;
        $sizes = null;

        if ($request->colors != '') {
            $colors = explode(",",$request->colors);
        }else {
            $colors = null;
        }

        if ($request->sizes != '') {
            $sizes = explode(",",$request->sizes);
        }else {
            $sizes = null;
        }

        Product::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'qty_alert' => $request->qty_alert,
            'stock' => $request->quantity,
            'image' => $imageName,
            'exp_date' => $request->exp_date,
            'colors' => serialize($colors),
            'sizes' => serialize($sizes),
            'desc' => $request->desc,
            // 'images' => json_encode($data),
            'promot' => $request->promot,
            'visible' => $request->visible,
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
        

        // dd($sizes);
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $colors = null;
        $sizes = null;
        $promot = null;
        $spaceColor = str_replace(' ', '', $request->colors);
        $spaceSize = str_replace(' ', '', $request->sizes);
        $getcolors = explode(",",$spaceColor);
        $getsizes = explode(",",$spaceSize);

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

        

        if ($request->colors != '') {
            $colors = serialize($getcolors);
        }else {
            $colors = $product->colors;
        }

        if ($request->sizes != '') {
            $sizes = serialize($getsizes);
        }else {
            $sizes = $product->sizes;
        }

        if ($request->promot != null) {
            $promot = 1;
        }else {
            $promot = 0;
        }



        $product->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),
            'reference' => $request->reference,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'stock' => $request->quantity,
            'qty_alert' => $request->qty_alert,
            'desc' => $request->desc,
            'image' => $imageName,
            'images' => $imagesUpdate,
            'visible' => $request->visible,
            'promot' => $promot,
            'exp_date' => $request->exp_date,
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
