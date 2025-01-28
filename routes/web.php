<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[homeController::class,'index'] )
->name('homepage');

Route::get('/login',[LoginController::class,'show'])
->name('login.show');
Route::post('/login',[LoginController::class,'login'])
->name('login');
Route::get('/logout',[LoginController::class,'logout'])
->name('login.logout');

Route::get('/profile',[profileController::class,'index'])
->name('profile.index');
Route::get('/profile/create',[profileController::class,'create'])
->name('profile.create');
Route::delete('/profile/{profile}',[profileController::class,'delete'])
->where('profile','\d+')
->name('profile.delete');
Route::get('/profile/{profile}',[profileController::class,'show'])
->where('profile','\d+')
->name('profile.show');


Route::post('/profile/create',[profileController::class,'store'])
->name('profile.store');



Route::get('/info',[infoController::class,'index'])
->name('info.index');


























/*Route::get('/salam/{nom}/{age}',function(Request $request){
    dd($request->route('nom'));
    return view('welcome',[
        'nom'=>$request->nom,
        'age'=>$request->age,
    ]);
});*/