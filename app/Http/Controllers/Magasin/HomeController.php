<?php

namespace App\Http\Controllers\Magasin;
use App\Http\Controllers\Controller;
use App\Models\Magasin\Product;
use Brian2694\Toastr\Facades\Toastr;
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
        $this->middleware('isMagasin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('magasin.home',['products' => Product::where('magasin_id',AuthMagasinAgent())->where('visible',1)->get()]);
    }
}
