<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Magasin;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.magasin.index',['magasins' => Magasin::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
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
        Magasin::where('id',$id)->update(['is_active' => $request->is_active]);
        notify()->success('Status du compte a bien ete modifier  ⚡️', 'Status compte magasin');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Magasin::where('id',$id)->delete();
        notify()->success('Ce compte a bien ete supprimer  ⚡️', 'Supression compte magasin');
        return back();
    }
}
