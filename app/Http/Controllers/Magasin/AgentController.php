<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Magasin\Agent;
use App\Notifications\NouveauCompte\NouveauCompteAgent;
class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMagasin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('magasin.agents.index',['agents' => Agent::where('magasin_id',Auth::guard('magasin')->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:agents',
            'phone' => 'required|numeric|unique:agents',
        ]);

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'magasin_id' => Auth::guard('magasin')->user()->id,
            'slug' => str_replace('/','',Hash::make(Str::random(4).$request->email)),
            'password' => Hash::make('password'),
            'confirmation_token' => str_replace('/','',Hash::make(Str::random(40))),
            'is_active' => 0,
            'status' => 0,
        ]);
        
        $email = Agent::where('email',$request->email)->first();
        $email->notify(new NouveauCompteAgent());
        notify()->success('Votre agent a ete ajouter avec success ⚡️', 'Ajout Agent');
        return back();
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        Agent::where('id',$id)->update(['is_active' => $request->is_active]);
        notify()->success('Status du compte a bien ete modifier  ⚡️', 'Status compte agent');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Agent::where('id',$id)->delete();
        notify()->success('Ce compte a bien ete supprimer  ⚡️', 'Supression compte agent');
        return back();
    }
}
