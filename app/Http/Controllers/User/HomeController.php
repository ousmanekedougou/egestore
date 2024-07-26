<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::guard('web')->user()){
            return redirect()->route('client.home');
        }elseif (Auth::guard('magasin')->user()) {
            return redirect()->route('magasin.home');
        }elseif (Auth::guard('agent')->user()) {
            return redirect()->route('agent.home');
        }else {
            return view('user.index');
        }
    }
}
