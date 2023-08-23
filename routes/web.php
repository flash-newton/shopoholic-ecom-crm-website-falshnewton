<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/testprod', function () {
    return view('features.users.account');
});

Route::get('/order/{id}', [App\Http\Controllers\Features\OrderController::class, 'show']);
Route::get('/admin-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show']);
Route::get('/userprofile/{id}', [App\Http\Controllers\Admin\Userscontroller::class, 'show']);


Auth::routes();
Route::get('/', [App\Http\Controllers\MyWelcomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/myprofile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::put('/profile-update/{id}', [App\Http\Controllers\ProfileController::class, 'update']);
Route::post('/passwordchange', [App\Http\Controllers\ProfileController::class, 'pwdchange']);

Route::prefix('admin')->middleware('auth','userRole')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/category-add', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/genre', [App\Http\Controllers\Admin\GenreController::class, 'index']);

    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/product-add', [App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('/product-add', [App\Http\Controllers\Admin\ProductController::class, 'store']);

    Route::get('/all-orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('/all-users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::get('/admins', [App\Http\Controllers\Admin\UsersController::class, 'viewadmins']);
    Route::get('/del-account/{id}', [App\Http\Controllers\Admin\UsersController::class, 'deluser']);
  


    
    
    
});

Route::get('/category-edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::put('/category-update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

Route::get('/product-details/{id}', [App\Http\Controllers\Admin\ProductController::class, 'checkDetails']);
Route::get('/product-edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'getEdit']);
Route::get('/product-delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'remove']);
Route::put('/product-update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);



/* Users and their features */

Route::get('/categories/all', [App\Http\Controllers\Features\DisplayController::class, 'viewAllCategory']);
Route::get('/products/{id}', [App\Http\Controllers\Features\DisplayController::class, 'viewProducts']);
Route::get('/order-confirmation', [App\Http\Controllers\Features\DisplayController::class, 'viewThanku']);

Route::get('/{cat_name}/{prod_id}', [App\Http\Controllers\Features\DisplayController::class, 'viewTheProduct']);

Route::middleware(['auth'])->group(function(){
    Route::get('/mycart', [App\Http\Controllers\Features\CartController::class, 'index']);
    Route::get('/checkout', [App\Http\Controllers\Features\DisplayController::class, 'showCheckout']);
    Route::get('/myorders', [App\Http\Controllers\Features\OrderController::class, 'index']);
    /*Route::get('/{id}/order',[App\Http\Controllers\Features\OrderController::class, 'show']);*/

    
});





