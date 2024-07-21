<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Client;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Order;
use App\Models\Magasin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = null;
        if(Cart::count() > 0){
            if (AuthMagasinAgentVisible() == 1){
                $magasin = Magasin::find(AuthMagasinAgent());
                $clients = $magasin->users;
            }else {
                $clients = Client::where('magasin_id',AuthMagasinAgent())->get();
            }
            return view('magasin.cart.index',['clients' => $clients]);
        }

        notify()->error('Votre panier est vide ⚡️', 'Produit existe');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('magasin')->user()->id) {
            Cart::destroy();
        }
        
        notify()->success('Votre produit a ete ajouter au panier ⚡️', 'Ajouter au panier');
        return redirect()->route('magasin.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id == $request->product_id;
        });


        if ($duplicata->isNotEmpty()) {
            notify()->error('Votre produit est deja dans le panier ⚡️', 'Produit existe');
            return back();
        }

        $product = Product::where('id',$request->product_id)->where('magasin_id',AuthMagasinAgent())->first();

        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Models\Magasin\Product');

        notify()->success('Votre produit a ete ajouter au panier ⚡️', 'Ajouter au panier');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        if ($qty < $product->model->quantity) {
            Cart::update($rowId,$qty);
            return back();
        }

        notify()->error('Il n\'y a pas cette quantite pour ce produit ⚡️', 'Quantite');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        if ($qty >= 1) {
            Cart::update($rowId,$qty);
            return back();
        }
        notify()->error('La quantite minimum est a 1 ⚡️', 'Quantite');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        notify()->success('Votre produit a ete supprimer dans le panier ⚡️', 'Suppression de produit');
        return back();
    }


    protected function checkNotAvailable()
	{
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
            return false;
        }
	}
    

    protected function generateCode(int $lenght = 6) : string
	{
	   return Random::generate($lenght, "0-9");
	}
}
