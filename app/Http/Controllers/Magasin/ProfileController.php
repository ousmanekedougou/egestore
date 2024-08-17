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
            'inv_at' => ['required', 'numeric'],
            'adresse' => ['required', 'string'],
            'visible' => ['required', 'boolean'],
            'password' => ['confirmed'],
        ]);
        $password = null;
        if($request->password == ''){
            $password = Auth::guard('magasin')->user()->password;
        }else {
            $password = Hash::make($request->password);
        }
        Magasin::find(Auth::guard('magasin')->user()->id)
        ->update(
        [
            'shop_name' => $request->shop_name,
            'admin_name' => $request->admin_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'visible' => $request->visible,
            'inv_at' => $request->inv_at,
            'password' => $password,
        ]);

        Toastr::success('Votre profile a bien été modifié', 'Modification de profiles', ["positionClass" => "toast-top-right"]);
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
