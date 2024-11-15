<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//    return view('welcome');
// }); 

Route::prefix('/')->name('utilisateur.')->group(function() 
{
    Route::get('/',[App\Http\Controllers\User\HomeController::class,'index'])->name('index');
    Route::get('/document',[App\Http\Controllers\User\DocumentController::class,'document'])->name('document');
    Route::get('/terme',[App\Http\Controllers\User\DocumentController::class,'terme'])->name('terme');
});

Auth::routes();

Route::prefix('/client')->name('client.')->group(function() 
{
    Route::get('/home',[App\Http\Controllers\Client\HomeController::class,'index'])->name('home');
    Route::put('/compte/{email}/{token}',[App\Http\Controllers\Auth\RegisterController::class,'confirmCompte'])->name('confirme');
    Route::get('/verify/{email}/{token}',[App\Http\Controllers\Auth\RegisterController::class,'verifyCompte'])->name('verify');

    Route::resource('/magasin', App\Http\Controllers\Client\MagasinController::class);
});

Route::prefix('/admin')->name('admin.')->group(function() 
{
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');

    Route::put('/compte/{email}/{token}',[App\Http\Controllers\Auth\RegisterController::class,'confirmCompte'])->name('confirme');
    Route::get('/verify/{email}/{token}',[App\Http\Controllers\Auth\RegisterController::class,'verifyCompte'])->name('verify');

    Route::resource('/magasin', App\Http\Controllers\Admin\MagasinController::class);
    Route::resource('/client', App\Http\Controllers\Admin\ClientController::class);
    Route::resource('/agent', App\Http\Controllers\Admin\AgentController::class);
    
    // login des admin
    Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
    // fin des login admin

     // Forgot password des admin
     Route::post('/verify',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'verify'])->name('verify');
     Route::get('/reset',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'reset'])->name('reset');
     Route::get('/confirm/{id}/{email}',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'confirm'])->name('confirm');
     Route::put('/update/{email}',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'update'])->name('update');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route des magasin
Route::prefix('/magasin')->name('magasin.')->group(function() {

    Route::get('/home',[App\Http\Controllers\Magasin\HomeController::class,'index'])->name('home');
    Route::put('/compte/{email}/{token}',[App\Http\Controllers\Magasin\Auth\RegisterController::class,'confirmCompte'])->name('confirme');
    Route::get('/verify/{email}/{token}',[App\Http\Controllers\Magasin\Auth\RegisterController::class,'verifyCompte'])->name('verify');
    Route::get('/register',[App\Http\Controllers\Magasin\Auth\RegisterController::class,'index'])->name('register');
    Route::post('/register',[App\Http\Controllers\Magasin\Auth\RegisterController::class,'register'])->name('register');

    Route::resource('/agent', App\Http\Controllers\Magasin\AgentController::class);
    Route::resource('/client', App\Http\Controllers\Magasin\ClientController::class);
    Route::resource('/produit', App\Http\Controllers\Magasin\ProduitController::class);
    Route::post('produit/{slug}/images',[App\Http\Controllers\Magasin\ProduitController::class,'imageStore'])->name('imageStore');
    Route::resource('/categorie', App\Http\Controllers\Magasin\CategoryController::class);
    Route::resource('/sous-categorie', App\Http\Controllers\Magasin\SubCategoryController::class);

    Route::resource('/commande', App\Http\Controllers\Magasin\OrderController::class);
    // Route::post('commande/post',[App\Http\Controllers\Magasin\OrderController::class,'post'])->name('commande.post');
    Route::get('pdf/{slug}',[App\Http\Controllers\Magasin\OrderController::class,'pdf'])->name('commande.pdf');
    Route::resource('/panier', App\Http\Controllers\Magasin\CartController::class);
    
    Route::resource('/profile', App\Http\Controllers\Magasin\ProfileController::class);
    Route::resource('/profile', App\Http\Controllers\Magasin\ProfileController::class);

    Route::resource('/reserve', App\Http\Controllers\Magasin\ReservationController::class);
    Route::resource('/bagage', App\Http\Controllers\Magasin\BagageController::class);
    Route::post('bagage/post',[App\Http\Controllers\Magasin\BagageController::class,'post'])->name('bagage.post');
    Route::resource('/bon', App\Http\Controllers\Magasin\BonController::class);
    Route::get('bon/delete/{id}',[App\Http\Controllers\Magasin\BonController::class,'delete'])->name('bon.delete');
    // Route::post('post',[App\Http\Controllers\Magasin\BonController::class,'post'])->name('bon.post');
    Route::post('reserve/post',[App\Http\Controllers\Magasin\ReservationController::class,'post'])->name('reserve.post');
    Route::get('reserve/delete/{id}',[App\Http\Controllers\Magasin\ReservationController::class,'delete'])->name('reserve.delete');


    // Les fournisseurs
    Route::resource('/fournisseurs', App\Http\Controllers\Magasin\SupplyController::class);
    Route::get('/fournisseurs/{id}/addSupply', [App\Http\Controllers\Magasin\SupplyController::class,'addSupply'])->name('fournisseurs.addSupply');


    // login des admin
    Route::get('/login',[App\Http\Controllers\Magasin\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[App\Http\Controllers\Magasin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout',[App\Http\Controllers\Magasin\Auth\LoginController::class, 'logout'])->name('logout');
    // fin des login admin

    // Forgot password des admin
    Route::post('/verify',[App\Http\Controllers\Magasin\Auth\ForgotPasswordController::class,'verify'])->name('verify');
    Route::get('/reset',[App\Http\Controllers\Magasin\Auth\ForgotPasswordController::class,'reset'])->name('reset');
    Route::get('/confirm/{id}/{email}',[App\Http\Controllers\Magasin\Auth\ForgotPasswordController::class,'confirm'])->name('confirm');
    Route::put('/update/{email}',[App\Http\Controllers\Magasin\Auth\ForgotPasswordController::class,'update'])->name('update');
});


// Route agents
Route::prefix('/agent')->name('agent.')->group(function() {

    Route::get('/home',[App\Http\Controllers\Agent\HomeController::class,'index'])->name('home');
    Route::get('/compte/{email}/{token}',[App\Http\Controllers\Agent\HomeController::class,'confirmCompte'])->name('confirme');
    
    Route::resource('/profile', App\Http\Controllers\Agent\ProfileController::class);
    
    // login des admin
    Route::get('/login',[App\Http\Controllers\Agent\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[App\Http\Controllers\Agent\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout',[App\Http\Controllers\Agent\Auth\LoginController::class, 'logout'])->name('logout');
    // fin des login admin

    // Forgot password des admin
    Route::post('/verify',[App\Http\Controllers\Agent\Auth\ForgotPasswordController::class,'verify'])->name('verify');
    Route::get('/reset',[App\Http\Controllers\Agent\Auth\ForgotPasswordController::class,'reset'])->name('reset');
    Route::get('/confirm/{id}/{email}',[App\Http\Controllers\Agent\Auth\ForgotPasswordController::class,'confirm'])->name('confirm');
    Route::put('/update/{email}',[App\Http\Controllers\Agent\Auth\ForgotPasswordController::class,'update'])->name('update');
});