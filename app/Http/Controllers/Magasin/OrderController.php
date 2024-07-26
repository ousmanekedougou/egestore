<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Magasin\Order;
use App\Models\Magasin\Product;
use App\Models\User\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
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
        return view('magasin.orders.index',['orders' => Order::where('magasin_id',AuthMagasinAgent())->orderBy('id','DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    public function pdf($slug)
    {
        $authName = null;

        if (Auth::guard('magasin')->user()) {
            $authName = Auth::guard('magasin')->user()->name;
        }elseif (Auth::guard('agent')->user()) {
            $authName = Auth::guard('agent')->user()->name;
        }

        $data  = [
                    'order' => Order::where('slug',$slug)->where('magasin_id',AuthMagasinAgent())->where('status',1)->first(),
                    'authName' => $authName
                ];

        $pdf =  PDF::loadview('magasin.orders.invoice',$data);

        return $pdf->download('Facture.pdf');
    }

    public function post(Request $request)
    {
        if ($this->checkNotAvailable()) {
            notify()->error('Un produit dans votre panier n\'est plus disponible ⚡️', 'Produit indisponible');
            return back();
        }

        $this->validate($request,[
            'client' => 'required|string',
            'name' => 'string',
            'phone' => 'numeric',
            'bon_commande' => 'string',
        ]);


        $name = null;
        $phone = null;
        $client = null;
        
        if($request->client == -1){
            $name = $request->name;
            $phone = $request->phone;
        }

        $user = Client::where('id',$request->client)->first();
        if ($user) {
            $client = $user->id;
        }else {
            $client = null;
        }

        // dd($client);
        

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' .$i][] = $product->model->image;
            $products['product_' .$i][] = $product->model->name;
            $products['product_' .$i][] = $product->model->price;
            $products['product_' .$i][] = $product->qty;
            $i++;

            $item = Product::find($product->model->id);

            $item->update(['quantity' => $item->quantity - $product->qty]);
        }

        // $code = $this->generateCode();
        $verify = Order::where("magasin_id", AuthMagasinAgent())->latest()->first();
        if ($verify) {
            $newOrder = $verify->order + 1;
        }else {
            $newOrder = 00001;
        }

        $getAmount = Cart::subtotal();
        $amount = str_replace(',', '', $getAmount);

        Order::create([
            'order' => $newOrder,
            'name' => $name,
            'phone' => $phone,
            'magasin_id' => AuthMagasinAgent(),
            'client_id' => $client,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$newOrder)),
            'bon_commande' => $request->bon_commande,
            'products' => serialize($products),
            'date' => now(),
            'amount' => number_format($amount,2, ',','.'),
            'status' => 2
        ]);

        Cart::destroy();

        notify()->success('Votre commande a bien ete ajouter ⚡️', 'Enregistrement de la commande');
        return redirect()->route('magasin.commande.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->checkNotAvailable()) {
            notify()->error('Un produit dans votre panier n\'est plus disponible ⚡️', 'Produit indisponible');
            return back();
        }

        $this->validate($request,[
            'client' => 'required|string',
            'bon_commande' => 'string',
            'name' => 'string',
            'phone' => 'numeric',
        ]);

        // dd($request->bon_commande);

        $name = null;
        $phone = null;
        $client = null;
        
        if($request->client == -1){
            $name = $request->name;
            $phone = $request->phone;
        }

        $user = User::where('id',$request->client)->first();
        if ($user) {
            $client = $user->id;
        }else {
            $client = null;
        }

        // dd($client);
        

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' .$i][] = $product->model->image;
            $products['product_' .$i][] = $product->model->name;
            $products['product_' .$i][] = $product->model->price;
            $products['product_' .$i][] = $product->qty;
            $i++;

            $item = Product::find($product->model->id);

            $item->update(['quantity' => $item->quantity - $product->qty]);
        }

        // $code = $this->generateCode();
        $verify = Order::where("magasin_id", AuthMagasinAgent())->latest()->first();
        if ($verify) {
            $newOrder = $verify->order + 1;
        }else {
            $newOrder = 00001;
        }

        $getAmount = Cart::subtotal();
        $amount = str_replace(',', '', $getAmount);

        Order::create([
            'order' => $newOrder,
            'name' => $name,
            'phone' => $phone,
            'magasin_id' => AuthMagasinAgent(),
            'user_id' => $client,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$newOrder)),
            'bon_commande' => $request->bon_commande,
            'products' => serialize($products),
            'date' => now(),
            'amount' => number_format($amount,2, ',','.'),
            'status' => 2
        ]);

        Cart::destroy();

        notify()->success('Votre commande a bien ete ajouter ⚡️', 'Enregistrement de la commande');
        return redirect()->route('magasin.commande.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('magasin.orders.show',['order' => Order::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $authName = null;

        if (Auth::guard('magasin')->user()) {
            $authName = Auth::guard('magasin')->user()->name;
        }elseif (Auth::guard('agent')->user()) {
            $authName = Auth::guard('agent')->user()->name;
        }

        return view('magasin.orders.invoice',[
            'order' => Order::where('slug',$slug)->where('magasin_id',AuthMagasinAgent())->first(),
            'authName' => $authName
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request,[
            'status' => 'required|numeric',
        ]);

        $dateUpdate = null;
        $incvoiceNum = null;
        if($request->status == 1){
            $dateUpdate = now();

            $num = Order::where("magasin_id", AuthMagasinAgent())->latest()->first();
            if ($num) {
                $incvoiceNum = $num->num_invoice + 1;
            }else {
                $incvoiceNum = 00001;
            }
        }

        Order::where('id',$id)->where('magasin_id',AuthMagasinAgent())
        ->update(
        [   'status' => $request->status,
            'payment_created_at' => $dateUpdate,
            'num_invoice' => $incvoiceNum
        ]);

        notify()->success('Le status de votre commande a ete mise a jour ⚡️', 'Status de commande');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where('id',$id)->where('magasin_id',AuthMagasinAgent())->delete();
        notify()->success('Votre commande a ete supprimer avec success ⚡️', 'Suppression de commande');
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
}
