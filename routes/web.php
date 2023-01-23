<?php

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\BlogCategorieController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ComblogController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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
Route::get('/likes', [HomeController::class,'like']);
Route::get('/backoffice', [BackofficeController::class,'backoffice']);
Route::get('/backoffice/mailbox/contacts', [BackofficeController::class,'mailbox']);
Route::get('/backoffice/mailbox/archives', [BackofficeController::class,'archives']);
Route::get('/shopcategory', [HomeController::class,'category'])->name('category');
Route::get('/categorie/{id}', [HomeController::class,'viewByCategory'])->name('categorie/{id}');
Route::get('/couleur/{id}', [HomeController::class,'viewByColor'])->name('couleur/{id}');
Route::get('/category/search', [HomeController::class,'viewBySearch'])->name('categorySearch');
Route::get('/tags/{id}', [BlogController::class,'filterByTags']);
Route::get('/blog/search', [BlogController::class,'filterBySearch']);
Route::get('/blogs/category/{id}', [BlogController::class,'filterByCategory']);
Route::get('/panier/checkout', [PanierController::class,'checkout']);
Route::get('/order/tracking', [OrderController::class,'index']);
Route::get('/order/tracking/search', [OrderController::class,'show']);
Route::post('/orders/validate/{id}', [OrderController::class,'confirm']);
Route::get('/orders', [OrderController::class,'orders']);
Route::get('/backoffice/blogs', [BlogController::class,'all']);
Route::delete('/order/delete/{id}', [OrderController::class,'destroy']);
Route::post('/panier/quantité', [PanierController::class,'quantité']);
Route::post('/panier/add', [PanierController::class,'addToPanier']);
Route::post('/checkout/coupon', [PanierController::class,'coupon']);
Route::post('/panier/checkout/confirmation', [PanierController::class,'payer']);
Route::post('/contact/archive/{id}', [ContactController::class,'archive']);
Route::post('/produit/like', [LikeController::class,'like']);
Route::get('/backoffice/produits', [LikeController::class,'index']);
Route::get('/backoffice/mailbox/reponse/{id}', [MailController::class,'reponse']);
Route::post('/backoffice/mailbox/reponse', [MailController::class,'mailReponse']);
Route::post('/backoffice/blog/confirm/{id}', [BlogController::class,'confirm']);



Route::post('/mail/product',[MailController::class,'productmail']);
Route::post('/mail/newsletter',[MailController::class,'newsletterMail']);
Route::post('/commentaire',[CommentaireController::class,'commentaire']);

Route::resource('contact', ContactController::class);
Route::resource('users', UserController::class);
Route::resource('produit', ProduitController::class);
Route::resource('blog', BlogController::class);
Route::resource('panier', PanierController::class);
Route::resource('tag', TagController::class);
Route::resource('category', CategorieController::class);
Route::resource('color', ColorController::class);
Route::resource('blogcategory', BlogCategorieController::class);
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
