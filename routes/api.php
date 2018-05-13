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


Route::resource('pharmacy', 'PharmacyController');

Route::resource('drug', 'DrugController');

Route::resource('drug_category', 'DrugCategoryController');

Route::resource('purchase', 'PurchaseController');

Route::resource('revenue', 'RevenueController');

Route::resource('sale', 'SaleController');

Route::resource('stock', 'StockController');

Route::resource('subscription', 'SubscriptionController');

Route::resource('user_detail', 'UserDetailController');

Route::resource('user','UserController');

//Getting user access level
Route::post('access_level', function (Request $request){
    $data = \App\User::where("email", $request->email)->first();
    return response(compact('data'), 201);
});


Route::post('user_registration',function(Request $request){
    $user = new \App\User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=$request->password;
    $user->save();
    $message='User created successfully';
    return response(compact('message'),200);
});


//Getting user access level
Route::get('access_level/{id}', function (Request $request){
   $access = \App\User::with('user')->where('id',$request->id)->get();
   return response()->json(compact('access'),200);
});


//Getting number of  registered users
Route::get('user_count/{id}',function(Request $request){
    $userCount = \App\User::where('user_id',$request->id)->get()->count();
    return response()->json(compact('userCount'),200);
});


//Checking user pharmacy status
Route::get('check_pharmacy/{id}', function (Request $request){
    $data = \App\Pharmacy::where('user_id',$request->id.'%')->get();
    return response()->json(compact('data'),200);
});


// Getting pharmacy`s stock
Route::get('my_stock/{id}',function(Request $request){
    $data = \App\Stock::where('user_id',$request->id.'%')->get();
    return response()->json(compact('data'),200);
});


//Getting number of registered pharmacies
Route::get('pharmacy_count/{id}',function(Request $request){
    $pharmacyCount = \App\Pharmacy::where('user_id',$request->id)->get()->count();
    return response()->json(compact('pharmacyCount'),200);
});


// Adding to stock
Route::post('addStock',function(Request $request){
    $response = \App\Stock::create($request->only([ 'pharm_id','drug_id','quantity','price']));
    return response(compact('response'),200);
});


//Getting number of drug categories available
Route::get('category_count/{id}',function(Request $request){
    $categoryCount = \App\DrugCategory::where('user_id',$request->id)->get()->count();
    return response()->json(compact('categoryCount'),200);
});

//getting all drug categories
Route::get('drugs_cat',function(){
    $data = \App\DrugCategory::all();
    return response()->json(compact('data'),200);
});

//getting all drugs from a particular category
Route::get('drug_cat_members/{id}',function(Request $request){
    $data =  \App\DrugCategory::with('drugs')->where('id',$request->id)->get();
    return response()->json(compact('data'),200);
});

