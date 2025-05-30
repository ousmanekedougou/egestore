<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Magasin\Product;
use App\Models\Magasin\SubCategory;
use App\Models\Magasin\Supply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isMagasinAgent']);
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

        $supply_id = null;
        $supply_name = null;
        
        $this->validate($request,[
            'name' => 'required|string',
            'reference' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'qty_alert' => 'required|numeric',
            'exp_date' => 'required',
            'image' => 'required|image|mimes:PNG,png',
            // 'images.*' => 'image|mimes:PNG,png', 
            'desc' => 'required|string',
            'visible' => 'required|boolean',
            'promot' => 'boolean',
        ]);

        if ($request->supply == 0) {
            $this->validate($request,[
                'supply_id' => 'required|numeric',
            ]);

            $supply_id = $request->supply_id;

        }elseif ($request->supply == 1) {
            $this->validate($request,[
                'supply_name' => 'required|string',
            ]);

            $supply_name = $request->supply_name;
        }

        $imageName = '';
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $Name = $request->name.'-'.Auth::guard('magasin')->user()->name.'.'. $file->getClientOriginalExtension();
            $image = Image::read($file);
            // Resize image
            $image->resize(530, 530, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/Products/' . $Name));

            $imageName = 'public/Products/'. $Name;
            
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

        $validatePromotion = '';

        if($request->promot == null){
            $validatePromotion = null;
        }else {
            if($request->price_promotion < $request->price){
                $validatePromotion = $request->price_promotion;
            }else {
                Toastr()->error('Le prix de la promotion doit etre inférieure au prix normale', 'Prix de la promotion', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }

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
            'promo_price' => $validatePromotion,
            'visible' => $request->visible,
            'magasin_id' => AuthMagasinAgent(),
            'supply_id' => $supply_id,
            'supply_name' => $supply_name,
            'sub_category_id' => $request->sub_category_id
        ]);
        Toastr()->success('Votre produit a bien été ajouté', 'Ajout de produits', ["positionClass" => "toast-top-right"]);
        return back();
    }

 

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $subcategory = SubCategory::where('slug',$slug)->first();

        $products = $subcategory->products()->paginate(50);
        return view('magasin.produits.index',
            [
                'products' => $products,
                'subcategory' => $subcategory,
                'supplies'    => Supply::where('owner_id',AuthMagasinAgent())->get()     
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('magasin.produits.show',
        [
            'product'   => Product::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first(),
            'supplies'  => Supply::where('owner_id',AuthMagasinAgent())->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // dd('cjj');
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $validatePromotion = '';

        if($request->promot == null){
            $validatePromotion = null;
        }else {
            if($request->price_promotion < $request->price){
                $validatePromotion = $request->price_promotion;
            }else {
                Toastr()->error('Le prix de la promotion doit etre inférieure au prix normale', 'Pprix de la promotion', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }

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
            Storage::delete($product->image);
            // $imageName = $request->image->store('public/Products');
            $file = $request->file('image');

            $Name = $request->name.'-'.Auth::guard('magasin')->user()->name.'.'. $file->getClientOriginalExtension();
            $image = Image::read($file);
            // Resize image
            $image->resize(530, 530, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/Products/' . $Name));

            $imageName = 'public/Products/'. $Name;
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
            'promo_price' => $validatePromotion,
            'exp_date' => $request->exp_date,
            'colors' => $colors,
            'sizes' => $sizes,
            'supply_id' => $request->supply_id,
            'magasin_id' => AuthMagasinAgent(),
            'sub_category_id' => $request->sub_category_id
        ]);

        Toastr()->success('Votre produit a bien été modifié', 'Modification de produits', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_product = Product::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();
        Storage::delete($delete_product->image);
        $delete_product->delete();
        Toastr()->success('Votre produit a bien été supprimé', 'Suppréssion de produits', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
