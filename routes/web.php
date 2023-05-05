<?php

use App\Models\Order;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductsController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// ghjbvcnbn
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
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/', function () {
    $slides = Slide::get();
    // $products = Product::take(6)->get();
    $products = Product::paginate(6);
    return view('home', compact('slides','products'));
})->name('home');


Route::get('/shop', [ShopController::class, 'index'])->name('shop');


Route::match(['get', 'post'], '/cart/{product}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{item}/inc', [CartController::class, 'inc'])->name('cart.inc');
Route::get('/cart/{item}/dec', [CartController::class, 'dec'])->name('cart.dec');
Route::get('/cart/{item}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




Route::resource('slides', SlidesController::class)->middleware('role:admin');
// Routes for admins only
Route::middleware('role:admin')->group(function () {
    Route::resource('products', ProductsController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Routes for all users (customers and admins)
Route::get('products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update']);

Route::resource('/comment', CommentController::class);



Route::resource('orders', OrdersController::class)->only(['index','destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        if (!Auth::user()->hasRole('admin')) {  // e bojm nese nuk osht auth si admin mos ti sheh orderat perndryshe le ti sheh vetem orderat e vete
            # code...
            $orders = Order::where('user_id', Auth::id())->count();
        } else {
            $orders = Order::count();
        }

        $slides = Slide::count();
        $products = Product::count();
        $orders = $orders;
        return view('dashboard',
         compact('products','slides','orders'));
    })->name('dashboard');
});
