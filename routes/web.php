<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\DashboardController;
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



Auth::routes();

Route::get('/', [ItemsController::class,'ShowItemGroup'])->name('welcome');
Route::get('/home', [ItemsController::class,'ShowItemGroup'])->name('home');


######################################################################################

Route::get('/itemgroup', [ItemsController::class,'GetItemGroup'])->name('itemgroup');
Route::post('/save', [ItemsController::class,'SaveGroupsItems'])->name('save');
Route::post('/update', [ItemsController::class,'update'])->name('update');

Route::get('/edit/{x}', [ItemsController::class,'edit'])->name('edit');
Route::get('/del/{x}', [ItemsController::class,'del'])->name('del');

######################################################################################

Route::get('/items', [ItemsController::class,'GetItems'])->name('items');
Route::post('/saveitem', [ItemsController::class,'SaveItems'])->name('saveitem');

Route::get('/deleteitems/{x}', [ItemsController::class,'deleteItem'])->name('deleteitems');
Route::get('/edititems/{x}', [ItemsController::class,'editItem'])->name('editItem');
Route::post('/updateitems', [ItemsController::class,'updateItem'])->name('updateItem');

######################################################################################


Route::get('/panel', [DashboardController::class,'GetItems'])->name('controlpanel');
Route::get('/addgritem', [DashboardController::class,'displayadditemsgroup'])->name('addgritem');

Route::get('/logout', [DashboardController::class,'logout'])->name('logout');

Route::get('/showproduct/{id}', [ItemsController::class,'showproduct'])->name('showproduct');
Route::get('/addtoCart/{id}', [ItemsController::class,'AddtoCart'])->name('AddtoCart');

Route::get('/checkout', [ItemsController::class,'CheckoutCart'])->name('checkout')->middleware('auth');

######################################################################################



Route::get('/TestAPI', [ItemsController::class,'TestAPI'])->name('TestAPI');