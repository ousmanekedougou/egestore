<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Magasin;
use App\Models\Magasin\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('magasin.supplies.index',[
            'magasins' => Magasin::where('is_active',1)->where('confirmation_token',null)->where('id','!=',AuthMagasinAgent())->get()
        ]);
    }

    public function addSupply($id){
        Supply::create([
            'supply_id' => $id,
            'magasin_id' => AuthMagasinAgent()
        ]);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('magasin.supplies.product',
            [
                'magasin' => Magasin::where('slug',$slug)->where('is_active',1)->where('confirmation_token',null)->where('id','!=',AuthMagasinAgent())->first()
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
        //
    }
}
