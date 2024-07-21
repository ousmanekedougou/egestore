<?php

use App\Models\Magasin\Category;
use App\Models\Magasin\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

if (!function_exists('page_title')) {
    function page_title($title)
    {
        $base_title = 'senmagasin';
        if ($title === '') {
            return  $base_title;
        } else {
            return $title . ' | ' . $base_title;
        }
    }
}

if (!function_exists('set_active_roote')) {
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if (!function_exists('AuthMagasinAgent')) {
    function AuthMagasinAgent()
    {
        $magasinId = null;

        if (Auth::guard('magasin')->user()) {
            $magasinId = Auth::guard('magasin')->user()->id;
        }elseif (Auth::guard('agent')->user()) {
            $magasinId = Auth::guard('agent')->user()->magasin->id;
        }

        return $magasinId;
    }
}

if (!function_exists('AuthMagasinAgentVisible')) {
    function AuthMagasinAgentVisible()
    {
        $visible = null;

        if (Auth::guard('magasin')->user()) {
            $visible = Auth::guard('magasin')->user()->visible;
        }elseif (Auth::guard('agent')->user()) {
            $visible = Auth::guard('agent')->user()->magasin->visible;
        }

        return $visible;
    }
}

if (!function_exists('allCategorie')){

    function allCategorie()
    {
        $magasinId = null;

        if (Auth::guard('magasin')->user()) {
            $magasinId = Auth::guard('magasin')->user()->id;
        }elseif (Auth::guard('agent')->user()) {
            $magasinId = Auth::guard('agent')->user()->magasin->id;
        }

        $categories = Category::where('magasin_id',$magasinId)->where('visible',1)->get();

        return $categories;
    }

}


if (!function_exists('ProductStockAlert')) {
    function ProductStockAlert()
    {
        $ProductStockAlert = null;

        $ProductStockAlert = Product::where('magasin_id',AuthMagasinAgent())->where('quantity','<',10)->get();
       
        return $ProductStockAlert;
    }
}


if (!function_exists('ProductStockVide')) {
    function ProductStockVide()
    {
        $ProductStockVide = null;

        $ProductStockVide = Product::where('magasin_id',AuthMagasinAgent())->where('quantity',0)->get();
       

        return $ProductStockVide;
    }
}