<?php

namespace App\Http\Controllers\Magasin;

use App\Http\Controllers\Controller;
use App\Models\Magasin\Category;
use App\Models\Magasin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class SubCategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['isMagasin','isAgent']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $this->validate($request,[
            'name' => 'required|string|unique:sub_categories',
            'visible' => 'required|boolean',
        ]);

        SubCategory::create(['name' => $request->name,'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name)),'visible' => $request->visible,'category_id' => $request->category_id]);

        notify()->success('Votre sous-categorie a ete ajouter avec success ⚡️', 'Ajout Categorie');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('magasin.subcategorie.index',['cateorie' => Category::where('id',$id)->where('magasin_id',AuthMagasinAgent())->first()]);
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
        SubCategory::where('id',$id)->update(['name' => $request->name,'visible' => $request->visible,'slug' => str_replace('/','',Hash::make(Str::random(2).$request->name))]);
        notify()->success('Status de la sous-categorie a bien ete modifier  ⚡️', 'Status sous-categorie');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::where('id',$id)->delete();
        notify()->success('Votre sous-categorie a ete supprimer avec success  ⚡️', 'Suppression sous-categorie');
        return back();
    }
}
