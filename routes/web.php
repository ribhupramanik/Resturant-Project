<?php

use App\Http\Controllers\PlaceOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthFrontEnd;
use App\Http\Controllers\Tables;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Catagories;
use App\Http\Controllers\FoodItems;
use App\Http\Controllers\Order;
use App\Http\Controllers\Restu_Home_Controller;
use App\Http\Controllers\Restu_Menu;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\Admin_Order;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin_Booking;


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


Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/home',[HomeController::class,'index']);

Route::middleware('auth')->group(function () {
Route::get('/tables',[Tables::class,'home']);
Route::get('/add_tables',action:[Tables::class,('add_tables_page')]);
Route::post('/add_tables',action:[Tables::class,('add_tables_form')]);
Route::get('/edit_table{ep}',[Tables::class,('edit_tables_page')]);
Route::post('/edit_tables_program',[Tables::class,('edit_tables_program')]);
Route::get('/delete_table{del}',[Tables::class,('delete_table')]);
});

Route::middleware('auth')->group(function () {
Route::get('/catagories',[Catagories::class,'home']);
Route::get('/add_catagory',action:[Catagories::class,('add_catagory_page')]);
Route::post('/add_catagory',[Catagories::class,('add_catagory_form')]);
Route::get('/edit_catagory{ep}',[Catagories::class,('edit_catagory_page')]);
Route::post('/edit_catagory_program',[Catagories::class,'edit_catagory_program']);
Route::get('/delete_catagory{del}',[Catagories::class,('delete_catagory')]);
});

Route::middleware('auth')->group(function () {
Route::get('/fooditems',[FoodItems::class,'home']);
Route::get('/add_fooditems',[FoodItems::class,'add_fooditems_page']);
Route::post('/add_new_food',[FoodItems::class,('add_fooditems_program')]);
Route::get('/edit_fooditems{ep}',[FoodItems::class,('edit_fooditems_page')]);
Route::post('/edit_fooditems_program',[FoodItems::class,'edit_fooditems_program']);
Route::get('/delete_fooditems{del}',[FoodItems::class,'delete_fooditems']);
});

Route::middleware('auth')->group(function () {
Route::get('/orders',[Admin_Order::class,'home']);
Route::get('/delete_orders{del}',[Admin_Order::class,'delete_order']);
});

Route::middleware('auth')->group(function () {
Route::get('/admin_booking',[Admin_Booking::class,'home']);
Route::get('/edit_booking{ep}',[Admin_Booking::class,'edit_booking_page']);
Route::post('/edit_booking_program',[Admin_Booking::class,'edit_booking_program']);
Route::get('/delete_booking{del}',[Admin_Booking::class,'delete_booking']);
});

Route::get('/',[Restu_Home_Controller::class,'index']);
Route::get('/menu',[Restu_Menu::class,'menu_view']);

Route::get('/cart',[Order::class,'cart']);
Route::post('/add-to-cart',[Order::class,'addToCart']);
Route::post('/update-cart',[Order::class,'updateCart']);
Route::post('/delete-cart-item',[Order::class,'deleteItem']);

Route::post('/placeOrder',[PlaceOrder::class,'place_order_program']);

Route::get('/booking',[BookingController::class,'home']);
Route::post('/add_booking',[BookingController::class,'add_booking']);



