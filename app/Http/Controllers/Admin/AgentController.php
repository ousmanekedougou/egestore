<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Departement;
use App\Notifications\NouveauCompte\NouveauAgent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function index(){
        if(Auth::guard('admin')->user()->status == 1){
            $departements = Departement::all();
            return view('admin.agent.index',['agents' => Admin::where('status','!=',1)->get(),'departements' => $departements]);
        }else {
            notify()->error('Vous n\'avier pas acces a cette page ⚡️', 'Acces reffuser');
            return back();
        }
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:admins',
            'phone' => 'required|numeric|unique:admins',
            'commune_id' => 'required|string',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'commune_id' => $request->commune_id,
            'slug' => str_replace('/','',Hash::make(Str::random(4).$request->email)),
            'password' => Hash::make('password'),
            'confirmation_token' => str_replace('/','',Hash::make(Str::random(40))),
            'is_active' => 0,
            'status' => 2,
        ]);
        
        $email = Admin::where('email',$request->email)->first();
        $email->notify(new NouveauAgent());
        notify()->success('Votre agent a ete ajouter avec success ⚡️', 'Ajout Agent');
        return back();
    }

    public function confirmCompte($email, $token){
        define('ACTIVE',1);
        $agent = Admin::where('email',$email)->where('confirmation_token',$token)->first();
        if ($agent) {
            $agent->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            notify()->success('Votre compte agent a ete confirmer avec success ⚡️', 'Confirmation compte agent');
            return redirect()->route('admin.login');
        }else {
            notify()->error('Ce lien ne semble plus valide ⚡️', 'Expiration du lien');
            return redirect()->route('utilisateur.index');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'status' => 'required|string|'
        ]);
        Admin::where('id',$id)->where('status','!=',1)->update(['status' => $request->status]);
        notify()->success('Le status de votre agent a ete modifier avec success ⚡️', 'Modification Agent');
        return back();
    }

    public function activeAgent(Request $request, $id){
        $this->validate($request,[
            'is_active' => 'required|string|'
        ]);
        $token = null;
        if ($request->is_active == 1) {
            $token = null;
        }else{
            $token = str_replace('/','',Hash::make(Str::random(5)));
        }
        Admin::where('id',$id)->where('status','!=',1)->update(['is_active' => $request->is_active,'confirmation_token' => $token]);
        notify()->success('Le status du compte de votre agent a ete modifier avec success ⚡️', 'Modification Compte Agent');
        return back();
    }

    public function destroy($id){
        $agent = Admin::where('id',$id)->where('status','!=',1)->first();
        $agent->delete();
        notify()->success('Votre agent a ete supprimer avec success ⚡️', 'Suppression Departement');
        return back();
    }
}
