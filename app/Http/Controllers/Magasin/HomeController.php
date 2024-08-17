<?php

namespace App\Http\Controllers\Magasin;
use App\Http\Controllers\Controller;
use App\Models\Magasin\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isMagasin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $paimentNotification = null;
        $isPaymentDay = false;
        if (Auth::guard('magasin')->user()->inv_status == false) {
            $today = date('d');
            if (Carbon::now()->day <= Auth::guard('magasin')->user()->inv_at) {
                $paimentNotification = "L'inventaire de votre boutique doit ce faire le " .Auth::guard('magasin')->user()->inv_at ." de ce mois";
            }elseif (Carbon::now()->day == Auth::guard('magasin')->user()->inv_at) {
                $paimentNotification = "L'inventaire de votre boutique doit ce faire aujourd'hui";
            }
        }

        // if ($today == Auth::guard('magasin')->user()->inv_at) {
        //     $isPaymentDay = true;
        // }
        
        return view('magasin.home',[
            'products' => Product::where('magasin_id',AuthMagasinAgent())->where('visible',1)->get(),
            'paimentNotification' => $paimentNotification,
            'isPaymentDay' => $isPaymentDay,
        ]);
    }
}
