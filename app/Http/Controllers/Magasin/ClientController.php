<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Client;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Order;
use App\Models\User\User;
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
        if (AuthMagasinAgentVisible() == 1) {
            $magasin = Magasin::find(AuthMagasinAgent());
            return view('magasin.clients.index',['clients' => $magasin->users]);
        }else {
            notify()->error('Vous n\'aviez pas acces a cette pages ⚡️', 'Error access');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (AuthMagasinAgentVisible() == 0) {
            $magasin = Magasin::find(AuthMagasinAgent());
            return view('magasin.clients.simple',['clients' => $magasin->clients]);
        }else {
            notify()->error('Vous n\'aviez pas acces a cette pages ⚡️', 'Error access');
            return back();
        }
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
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'magasin_id' => AuthMagasinAgent(),
            'slug' => str_replace('/','',Hash::make(Str::random(2).$request->email)),
        ]);

        notify()->success('Votre client a ete ajouter avec success ⚡️', 'Ajout de clients');
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

        Client::where('id',$id)->where('magasin_id',AuthMagasinAgent())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        notify()->success('Votre client a ete modifier avec success ⚡️', 'Modification de clients');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::where('id',$id)->delete();
        notify()->success('Ce client a bien ete supprimer  ⚡️', 'Supression de client');
        return back();
    }
}
