<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Product;
use App\Models\Magasin\Supply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isMagasinAgent']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('magasin.supplies.index',[
            'magasins' => Magasin::where('is_active',1)->where('confirmation_token',null)->where('id','!=',AuthMagasinAgent())->get(),
            // 'supplyExists' => Supply::where('owner_id',AuthMagasinAgent())->get()
        ]);
    }

    public function addSupply($id){
        $magasin = Magasin::where('is_active',1)->where('confirmation_token',null)->where('id',$id)->first();
        $supplyExist = Supply::where('owner_id',AuthMagasinAgent())->where('magasin_id',$magasin->id)->first();
        if ($supplyExist) {
            Toastr()->error('Ce magasin est déjà ajouté comme fournisseur', 'Ce magasin éxiste', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Supply::create([
                'owner_id' => AuthMagasinAgent(),
                'magasin_id' => $magasin->id,
                'slug' => str_replace('/','',Hash::make(Str::random(2).$magasin->name)),
            ]);
            Toastr()->success('Ce magasin a été ajouté comme fourniseur', 'Ajout fournisseur', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('magasin.supplies.supplie',[
            'supplies' => Supply::where('owner_id',AuthMagasinAgent())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $magasin = Magasin::where('slug',$slug)
        ->where('is_active',1)->where('confirmation_token',null)
        ->where('id','!=',AuthMagasinAgent())
        ->first();
        $duration = '';
        if ($magasin->created_at->diffInDays(now()) < 30) {
            $duration = $magasin->created_at->diffInDays(now())." jour(s)";
        }elseif ($magasin->created_at->diffInMonths(now()) < 12) {
            $duration = $magasin->created_at->diffInMonths(now())." moi(s)";
        }else{
            $duration = $magasin->created_at->diffInYearss(now())." an(s)";
        }
        return view('magasin.supplies.magasin_show',
            [
                'magasin' => $magasin,
                'products' => Product::where('magasin_id',$magasin->id)
                    ->inRandomOrder()
                    ->limit(12)
                    ->orderBy('id','DESC')
                    ->get(),
                'duration' => $duration
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function about($slug)
    {
        
        $supply = Supply::where('slug',$slug)->first();
        // dd($supply->magasin->name);
        // $magasin = Magasin::where('id',$supply->magasin_id)
        // ->where('is_active',1)->where('confirmation_token',null)
        // ->where('id','!=',AuthMagasinAgent())
        // ->first();
        if ($supply->magasin->is_active == 1 && $supply->magasin->confirmation_token == null && $supply->magasin->id != AuthMagasinAgent()) 
        {
            $duration = '';
            if ($supply->magasin->created_at->diffInDays(now()) < 30) {
                $duration = $supply->magasin->created_at->diffInDays(now())." jour(s)";
            }elseif ($supply->magasin->created_at->diffInMonths(now()) < 12) {
                $duration = $supply->magasin->created_at->diffInMonths(now())." moi(s)";
            }else{
                $duration = $supply->magasin->created_at->diffInYearss(now())." an(s)";
            }
            return view('magasin.supplies.supplie_show',
                [
                    'magasin' => $supply->magasin,
                    'products' => Product::where('magasin_id',$supply->magasin->id)
                        ->inRandomOrder()
                        ->limit(12)
                        ->orderBy('id','DESC')
                        ->get(),
                    'duration' => $duration
                ]
            );
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplyGet = Supply::where('id',$id)->where('owner_id',AuthMagasinAgent())->first();
        Product::where('supply_id',$supplyGet->id)->where('magasin_id',AuthMagasinAgent())->update(['supply_id' => null,'supply_name' => $supplyGet->name]);
        $supplyGet->delete();
        Toastr()->success('Fournisseur a été supprimé avec success', 'Suppréssion fournisseur', ["positionClass" => "toast-top-right"]);
        return back();
    }

    private function getDuration(){
        
    }
}
