<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use App\Models\Magasin\Agent;
use App\Models\Magasin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAgent')->except('confirmCompte');
    }

    public function confirmCompte($email, $token){
        define('ACTIVE',1);
        $agent = Agent::where('email',$email)->where('confirmation_token',$token)->first();
        if ($agent) {
            $agent->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            notify()->success('Votre compte agent a ete confirmer avec success ⚡️', 'Confirmation compte agent');
            return redirect()->route('agent.login');
        }else {
            notify()->error('Ce lien ne semble plus valide ⚡️', 'Expiration du lien');
            return redirect()->route('agent.login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('agent.home',['products' => Product::where('magasin_id',AuthMagasinAgent())->where('visible',1)->get()]);
    }
}
