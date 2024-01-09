<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   // return $request->user();
   
//});
Route::get('product',[ApiController::class,'index']);
Route::post('product',[ApiController::class,'upload']);
Route::get('product/edit/{id}',[ApiController::class,'getedit']);
Route::put('product/gedit/{id}',[ApiController::class,'edit']);
Route::delete('product/edit/{id}',[ApiController::class,'delete']);