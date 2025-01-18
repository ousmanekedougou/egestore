<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Magasin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        return view('magasin.profile.index');
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
        $this->validate($request,[
            'shop_name' => ['required', 'string'],
            'admin_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
            'adresse' => ['required', 'string'],
            'visible' => ['required', 'boolean'],
            'password' => ['confirmed'],
        ]);

        // dd($request->shop_name);

        $password = null;
        $inv_at = null;
        $imageName = null;
        $logoName = null;

        
        if($request->password == null){
            $password = Auth::guard('magasin')->user()->password;
        }else {
            $password = Hash::make($request->password);
        }


        if ($request->inv_at == null) {
            $inv_at = Auth::guard('magasin')->user()->inv_at;
        }else {
            $inv_at = $request->inv_at;
        }
        
        if($request->hasFile('logo'))
        {
            $logoName = $request->logo->store('public/Profiles/Logos');
        }else{
            $logoName = Auth::guard('magasin')->user()->logo;
        }

        
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Profiles/Images');
        }else{
            $imageName = Auth::guard('magasin')->user()->image;
        }

        Magasin::find(Auth::guard('magasin')->user()->id)
        ->update(
        [
            'logo' => $logoName,
            'image' => $imageName,
            'name' => $request->shop_name,
            'admin_name' => $request->admin_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'visible' => $request->visible,
            'inv_at' => $inv_at,
            'registre_com' => $request->rccm,
            'ninea' => $request->ninea,
            'password' => $password,
        ]);

        Toastr()->success('Votre profile a bien été modifié', 'Modification de profiles', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
