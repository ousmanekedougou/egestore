<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Client;
use App\Models\Magasin\Commande;
use App\Models\Magasin\Magasin;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (AuthMagasinAgentVisible() == 1){
            $magasin = Magasin::find(AuthMagasinAgent());
            $clients = $magasin->users;
        }else {
            $clients = Client::where('magasin_id',AuthMagasinAgent())->get();
        }
        return view('magasin.reserves.index',
        [
            'reserves' => Commande::where('magasin_id',AuthMagasinAgent())->where('type',1)->orderBy('id','DESC')->get(),
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function post(Request $request)
    {
        $this->validate($request,[
            'client' => 'required|string',
            'bon_commande' => 'string',
            'name' => 'string',
            'email' => 'string|email',
            'phone' => 'numeric',
        ]);

        $name = null;
        $email = null;
        $phone = null;
        $client = null;
        
        if($request->client == -1){
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
        }

        $user = Client::where('id',$request->client)->first();
        if ($user) {
            $client = $user->id;
        }else {
            $client = null;
        }

        $verify = Commande::where("magasin_id", AuthMagasinAgent())->where('type',1)->latest()->first();
        if ($verify) {
            $newOrder = $verify->order + 1;
        }else {
            $newOrder = 00001;
        }

        Commande::create([
            'order' => $newOrder,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'magasin_id' => AuthMagasinAgent(),
            'client_id' => $client,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$newOrder)),
            'bon_commande' => $request->bon_commande,
            'date' => now(),
            'type' => 1,
            // 'amount' => number_format($amount,2, ',','.'),
            'status' => 2
        ]);

        notify()->success('Votre reservation a bien ete ajouter ⚡️', 'Enregistrement de la commande');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'client' => 'required|string',
            'bon_commande' => 'string',
            'name' => 'string',
            'email' => 'string|email',
            'phone' => 'numeric',
        ]);

        $name = null;
        $email = null;
        $phone = null;
        $client = null;
        
        if($request->client == -1){
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
        }

        $user = User::where('id',$request->client)->first();
        if ($user) {
            $client = $user->id;
        }else {
            $client = null;
        }

        $verify = Commande::where("magasin_id", AuthMagasinAgent())->where('type',1)->latest()->first();
        if ($verify) {
            $newOrder = $verify->order + 1;
        }else {
            $newOrder = 00001;
        }

        Commande::create([
            'order' => $newOrder,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'magasin_id' => AuthMagasinAgent(),
            'user_id' => $client,
            'slug' => str_replace('/','',Hash::make(Str::random(2).$newOrder)),
            'bon_commande' => $request->bon_commande,
            'date' => now(),
            'type' => 1,
            // 'amount' => number_format($amount,2, ',','.'),
            'status' => 2
        ]);

        notify()->success('Votre reservation a bien ete ajouter ⚡️', 'Enregistrement de la commande');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('magasin.reserves.show',['reserve' => Commande::where('id',$id)->where('magasin_id',AuthMagasinAgent())->where('type',1)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

            $num = Commande::where("magasin_id", AuthMagasinAgent())->where('type',1)->latest()->first();
            if ($num) {
                $incvoiceNum = $num->num_invoice + 1;
            }else {
                $incvoiceNum = 00001;
            }
        }

        Commande::where('id',$id)->where('magasin_id',AuthMagasinAgent())
        ->update(
        [   'status' => $request->status,
            'payment_created_at' => $dateUpdate,
            'num_invoice' => $incvoiceNum
        ]);

        notify()->success('Le status de cette reservation a ete mise a jour ⚡️', 'Status de reservation');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commande::where('id',$id)->where('magasin_id',AuthMagasinAgent())->where('type',1)->delete();
        notify()->success('Votre reservation a ete supprimer avec success ⚡️', 'Suppression de reservation');
        return back();
    }
}
