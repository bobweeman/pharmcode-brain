<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/pharmacy', 'PharmacyController');

Route::resource('/drug', 'DrugController');

Route::resource('/purchase', 'PurchaseController');

Route::resource('/revenue', 'RevenueController');

Route::resource('/sale', 'SaleController');

Route::resource('/stock', 'StockController');

Route::resource('/subscription', 'SubscriptionController');

Route::resource('/userdetail', 'UserDetailController');


Route::post('user_registration',function(Request $request){
    $user = new \App\User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();
    $message='User created successfully';
    return response(compact('message'),200);
});