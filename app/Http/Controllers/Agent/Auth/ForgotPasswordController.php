<?php

namespace App\Http\Controllers\Citoyen\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Citoyen;
use App\Notifications\ForgotPassword\ForgotCitoyenPassword;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function reset(){
        return view('citoyen.auth.passwords.email');
    }

    public function verify(Request $request){
        $validator = $this->validate($request , [
            'email' => 'required|email',
        ]);

        $admin_email = Citoyen::where('email',$request->email)->first();

        if ($admin_email) {
            $admin_email->notify(new ForgotCitoyenPassword());
            notify()->success('Un email vous a ete envoyer merci de verifie ⚡️', 'Reinitailisation Mot de passe');
            return redirect()->route('utilisateur.index');
        }else {
            notify()->error('Cet adresse email n\' existe pas !⚡️', 'Email inexistan');
            return back();
        }
    }

    public function confirm($id,$email){
        $admin_confirm = Citoyen::where('id',$id)->where('email',$email)->first();
        $token= str_replace('/','',Hash::make(Str::random(40)));
        if($admin_confirm){
            return view('citoyen.auth.passwords.reset',compact('admin_confirm','id','token','email'));
        }
    }

    public function update(Request $request,$email){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|string|confirmed',
        ]);
        $token = $request->token;
        if ($token) {
            $update_admin_email = Citoyen::where('email',$email)->first();
            
            if ($update_admin_email) {
                $update_admin_email->update(['password' => Hash::make($request->password)]);
                notify()->success('Votre mot de passe a ete modifier avec success ,veuillez vous connecter a nouveu⚡️', 'Reinitailisation Mot de passe');
                return redirect()->route('citoyen.login');
            }else {
                notify()->error('Adress email ou mot de passe non valide⚡️', 'Error de coordonner');
                return back();
            }
        }
        notify()->error('Cette requette semble plus valide⚡️', 'Expiration de requette');
        return back();
    }
}
