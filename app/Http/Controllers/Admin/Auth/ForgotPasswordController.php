<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Notifications\ForgotPassword\ForgotAdminPassword;

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
        return view('admin.auth.passwords.email');
    }

    public function verify(Request $request){
        $validator = $this->validate($request , [
            'email' => 'required|email',
        ]);

        $admin_email = Admin::where('email',$request->email)->first();

        if ($admin_email) {
            $admin_email->notify(new ForgotAdminPassword());
            notify()->success('Un email vous a ete envoyer merci de verifie ⚡️', 'Reinitailisation Mot de passe');
            return redirect()->route('utilisateur.index');
        }else {
            notify()->error('Cet adresse email n\' existe pas !⚡️', 'Email inexistan');
            return back();
        }
    }

    public function confirm($id,$email){
        $admin_confirm = Admin::where('id',$id)->where('email',$email)->first();
        $token= str_replace('/','',Hash::make(Str::random(40)));
        if($admin_confirm){
            return view('admin.auth.passwords.reset',compact('admin_confirm','id','token','email'));
        }
    }

    public function update(Request $request,$email){
        $this->validate($request,[
            'password' => 'required|string|confirmed',
        ]);
        $token = $request->token;
        if ($token) {
            $update_admin_email = Admin::where('email',$email)->first();
            
            if ($update_admin_email) {
                $update_admin_email->update(['password' => Hash::make($request->password)]);
                notify()->success('Votre mot de passe a ete modifier avec success ,veuillez vous connecter a nouveu⚡️', 'Reinitailisation Mot de passe');
                return redirect()->route('admin.login');
            }else {
                notify()->error('Adress email ou mot de passe non valide⚡️', 'Error de coordonner');
                return back();
            }
        }
        notify()->error('Cette requette semble plus valide⚡️', 'Expiration de requette');
        return back();
    }
}
