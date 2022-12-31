<?php
//$header = apache_request_headers();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCalcular;
use App\Http\Controllers\ControllerCalcularCarrinho;

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
/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
// var_dump($header);
//$param = explode("/",trim($_SERVER['REQUEST_URI']));
// var_dump($param); die;
Route::get('/calcular/', [ControllerCalcular::class, "ControllerCalcular"]);
Route::get('/calcular/{produto}/', [ControllerCalcular::class, "ControllerCalcular"]);
Route::post('/carrinho/', [ControllerCalcularCarrinho::class, "CalcularCarrinho"]);


