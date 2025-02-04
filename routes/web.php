<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PublicationController;
use App\Models\Publication;
use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/', [homeController::class, 'index'])
    ->name('homepage');


Route::get('/logout', [LoginController::class, 'logout'])
    ->name('login.logout')->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])
        ->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login');
});




Route::get('/info', [infoController::class, 'index'])
    ->name('info.index');
Route::resource('profile', profileController::class);
Route::resource('publication', PublicationController::class);












/////////
Route::get('route/{a}/{b}', function (Request $request, Calcul $calcul) {
    $a = $request->a;
    $b = $request->b;
    $some = $calcul->mains($a, $b);
    return 'Somme ' . $some;
});
Route::view('/form', 'form');
Route::post('/form', function (Request $request) {

    /*$name = $request->input('name')?:'Nom name';
        dd($name);*/
    $url = 'storage/profile/1HcvcFpVzOXQuLjMJKEwDVoouHtpup2pdickXSAW.jpg';

    //return response()->download($url);
    /*return response()->file($url,[
            'Content-Disposition'=>'inline'
        ]);*/
});

Route::get('cookie/get', function (Request $request) {
    return response($request->cookie('job'));
});

Route::get('cookie/set/{cookie}', function ($cookie) {
    $response = new Response();
    //$response->cookie('age',$cookie,60);
    $cookieObject = cookie('job', $cookie, 1);
    $response->withCookie($cookieObject);
    return $response;
});

Route::get('resuest', function (Response $response) {
    $response->setContent('rachidyy Dev');
    // $response->json(['data'=>'info']);
    return $response;
});

Route::get('headers', function () {
    $response = new Response();
    $response->withHeaders([
        'Content-Type' => 'Text/plain',
        'X-REDA' => 'Yes',
    ]);
    //$response->header();
    //$response->header('host','XYZ');
    return $response->setContent(['date' => 'rachidy']);
});

























/*Route::get('/salam/{nom}/{age}',function(Request $request){
    dd($request->route('nom'));
    return view('welcome',[
        'nom'=>$request->nom,
        'age'=>$request->age,
    ]);
});*/