<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){

Route::get('get-list',[ApiController::class,'GatAllDetails']);
Route::get('discat-list',[ApiController::class,'GatDiscatDetails']);
Route::get('disease-list/{dc_id}',[ApiController::class,'GatDiseaseDet']);
Route::get('prodcat-list',[ApiController::class,'GatProdcatDet']);
Route::get('product-list/{pc_id}',[ApiController::class,'GatProductDet']);
Route::post('change-password',[ApiController::class,'ChangeCustomerPW']);
Route::get('customer-details',[ApiController::class,'ChangeDetails']);
Route::post('customer-edit/{id}',[ApiController::class,'CustomerEdit']);

Route::post('customer-address/{id}',[ApiController::class,'CustAddress']);
Route::post('customer-address-edit/{id}',[ApiController::class,'CustAddressEdit']);
Route::post('customer-address-delete/{id}',[ApiController::class,'CustAddDel']);
Route::post('customer-addres-default/{id}',[ApiController::class,'CustAddDefault']);
Route::get('customer-address-details',[ApiController::class,'CustAddrssDetails']);

Route::post('add-to-cart/{id}',[ApiController::class,'AddCart']);
Route::get('cart-list/{cust_id}',[ApiController::class,'CartList']);
Route::post('cart-item-delete/{id}',[ApiController::class,'CartItemDel']);
Route::get('cart-items-count',[ApiController::class,'CartItemsCount']);

Route::post('place-orders',[ApiController::class,'Orders']);
Route::get('ordered-list/{order_id}',[ApiController::class,'OrderedList']);


});

Route::post('register',[ApiController::class,'CustomerRegister']);
Route::post('cutomer-login',[ApiController::class,'CustomerLog']);
