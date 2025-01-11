<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admincontroller;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/',[HomeController::class,'index']);
route::get('/product',[Admincontroller::class,'product']);
route::get('/showproduct',[Admincontroller::class,'showproduct']);
route::get('/updateview/{id}',[Admincontroller::class,'updateview']);
route::get('/deleteproduct/{id}',[Admincontroller::class,'deleteproduct']);
route::post('/updateproduct/{id}',[Admincontroller::class,'updateproduct']);
route::get('/search',[Admincontroller::class,'search']);
route::post('/addcart/{id}',[HomeController::class,'addcart']);
route::get('/showcart',[HomeController::class,'showcart']);
route::get('/deletecart/{id}',[HomeController::class,'deletecart']);

route::post('/uploadproduct',[Admincontroller::class,'uploadproduct']);