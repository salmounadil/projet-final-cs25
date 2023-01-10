<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComblogController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Mail\ProductMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/category', [HomeController::class,'category'])->name('category');
Route::get('/categorie/{id}', [HomeController::class,'viewByCategory'])->name('categorie/{id}');
Route::get('/couleur/{id}', [HomeController::class,'viewByColor'])->name('couleur/{id}');
Route::get('/category/search', [HomeController::class,'viewBySearch'])->name('categorySearch');
Route::get('/tags/{id}', [BlogController::class,'filterByTags']);
Route::get('/blog/search', [BlogController::class,'filterBySearch']);
Route::get('/blogs/category/{id}', [BlogController::class,'filterByCategory']);


Route::post('/mail/product',[MailController::class,'productmail']);
Route::post('/mail/newsletter',[MailController::class,'newsletterMail']);
Route::post('/commentaire',[CommentaireController::class,'commentaire']);

Route::resource('contact', ContactController::class);
Route::resource('produit', ProduitController::class);
Route::resource('blog', BlogController::class);
Route::resource('panier', PanierController::class);
Route::post('/comBlog', [ComblogController::class,'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
