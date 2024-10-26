<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Client;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Order;
use App\Models\Magasin\Payment;
use App\Models\User\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
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
        $magasin = Magasin::find(AuthMagasinAgent());
        return view('magasin.clients.index',['clients' => $magasin->users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $magasin = Magasin::find(AuthMagasinAgent());
        return view('magasin.clients.simple',['clients' => $magasin->clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'string|email|unique:clients',
            'phone' => 'required|numeric|unique:clients',
            'account' => 'numeric',
        ]);

        // dd($request->account);

        $depot = null;
        $credit = null;
        $account = null;

        if($request->account == 1){
            $depot = $request->amount;
            $account = 1;
        }elseif($request->account == 2){
            $credit = $request->amount;
            $account = 2;
        }elseif ($request->account == 3 || $request->account == null) {
            $credit = null;
            $depot = null;
            $account = 3;
        }
        

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->email)),
            'amount' => null,
            'depot' => $depot,
            'credit' => $credit,
            'account' => $account,
            'magasin_id' => AuthMagasinAgent(),
        ]);

        Toastr::success('Votre client a bien été ajouté', 'Ajout de clients', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::where('user_id',$id)->where('magasin_id',AuthMagasinAgent())->orderBy('id','DESC')->get();
        return view('magasin.clients.show',[
            'client' => User::where('id',$id)->where('is_active',1)->first(),
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = Order::where('client_id',$id)->where('magasin_id',AuthMagasinAgent())->orderBy('id','DESC')->get();
        return view('magasin.clients.show',[
            'client' => Client::where('id',$id)->first(),
            'orders' => $orders
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'string|email',
            'phone' => 'required|numeric',
        ]);

        

        $client = Client::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first();
        $amount = null;
        $credit = null;
        $account = null;
        $depot = null;
        
        if($client->account == 2){
            if ($request->amount <= $client->credit) {
                if ($client->credit > $client->amount) {
                    $amount = $client->amount + $request->amount;
                    $account = 2;
                    $credit = $client->credit;
                    Payment::create(['client_id' => $id,'magasin_id' => AuthMagasinAgent(),'date' => Carbon::now(),'amount' => $request->amount]);
                }
            }else {
                Toastr::error('Ce montant est superieur a la somme acrediter', 'Surplus du montant', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }elseif ($client->account == 3) {
            if ($request->account == 1) {
                // dd($request->account);
                $depot = $request->amount;
                $account = 1;
                $credit = null;
            }elseif($request->account == 2) {
                $credit = $request->amount;
                $account = 2;
                $depot = null;
            }else{
                $account = 3;
                $depot = null;
                $credit = null;
                $amount = null;
            }
        }

        // dd($account);


        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $amount,
            'depot' => $depot,
            'credit' => $credit,
            'account' => $account,
        ]);


        if ($client->account == 2 && $client->credit == $client->amount) {
            Order::where('client_id',$client->id)
                ->where('magasin_id',AuthMagasinAgent())
                ->where('status',2)
                ->where('type',2)->update(['status' => 1 , 'type' => 1]);

            $client->update(['account' => 3,'amount' => null,'credit' => null]);
            Payment::where('client_id',$client->id)
                ->where('magasin_id',AuthMagasinAgent())->delete();

        }

        Toastr::success('Votre client a bien été modifié', 'Modification de clients', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::where('id',$id)->delete();
        Toastr::success('Votre client a bien été supprimé', 'Suppression de clients', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
